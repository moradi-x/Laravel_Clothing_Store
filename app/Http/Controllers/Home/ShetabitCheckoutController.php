<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\Models\UserAddress;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;

class ShetabitCheckoutController extends Controller
{
    public function start(Request $request)
    {
        $request->validate([
            'address_id' => ['required', 'integer'],
        ]);

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $items = Cart::getContent();

        if ($items->isEmpty()) {
            return redirect()->route('home.cart.index')
                ->withErrors(['payment' => 'سبد خرید شما خالی است.']);
        }

        $address = UserAddress::where('user_id', auth()->id())
            ->findOrFail($request->address_id);

        $orderItems = [];

        foreach ($items as $item) {
            $variation = ProductVariation::find($item->attributes->id);

            if (!$variation || $variation->quantity < $item->quantity) {
                return redirect()->route('home.cart.index')
                    ->withErrors([
                        'payment' => 'موجودی یکی از محصولات کافی نیست.',
                    ]);
            }

            $product = $item->associatedModel;

            if (!$product) {
                return redirect()->route('home.cart.index')
                    ->withErrors([
                        'payment' => 'یکی از محصولات دیگر موجود نیست.',
                    ]);
            }

            $price = $item->price;

            if (!is_numeric($price) || $price < 0) {
                return redirect()->route('home.cart.index')
                    ->withErrors([
                        'payment' => 'قیمت یکی از محصولات معتبر نیست.',
                    ]);
            }

            $orderItems[] = [
                'product_id' => $product->id,
                'product_variation_id' => $variation->id,
                'price' => $price,
                'quantity' => $item->quantity,
                'subtotal' => $price * $item->quantity,
            ];
        }

        if (session()->has('coupon')) {
            $couponResult = checkCoupone(session('coupon.code'));

            if (isset($couponResult['error'])) {
                return redirect()->route('home.cart.index')
                    ->withErrors([
                        'payment' => 'کد تخفیف معتبر نیست؛ لطفاً دوباره بررسی کنید.',
                    ]);
            }
        }

        $total = Cart::getTotal() + cartTotalSaleAmount();
        $delivery = cartTotalDeliveryAmount();
        $couponAmount = session()->has('coupon')
            ? session('coupon.amount')
            : 0;
        $couponId = session('coupon.id');

        $payingAmount = cartTotalAmount();

        if ($payingAmount <= 0) {
            return redirect()->route('home.cart.index')
                ->withErrors([
                    'payment' => 'مبلغ پرداخت باید بیشتر از صفر باشد.',
                ]);
        }

        $order = null;

        try {
            $order = DB::transaction(function () use (
                $address,
                $total,
                $delivery,
                $couponAmount,
                $couponId,
                $payingAmount,
                $orderItems
            ) {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'address_id' => $address->id,
                    'coupon_id' => $couponId,
                    'status' => 0,
                    'total_amount' => $total,
                    'delivery_amount' => $delivery,
                    'coupon_amount' => $couponAmount,
                    'paying_amount' => $payingAmount,
                    'payment_type' => 'online',
                    'payment_status' => 0,
                ]);

                foreach ($orderItems as $item) {
                    $item['order_id'] = $order->id;
                    OrderItem::create($item);
                }

                return $order;
            });

            $invoice = (new Invoice())->amount($payingAmount);

            return Payment::via('zarinpal')
                ->callbackUrl(route('shetabit-checkout.verify', [
                    'order' => $order->id,
                ]))
                ->purchase($invoice, function ($driver, $id) use (
                    $order,
                    $payingAmount
                ) {
                    Transaction::create([
                        'user_id' => auth()->id(),
                        'order_id' => $order->id,
                        'amount' => $payingAmount,
                        'token' => (string) $id,
                        'gateway_name' => 'zarinpal',
                        'status' => 0,
                        'descrption' => 'Shetabit Zarinpal payment',
                    ]);
                })
                ->pay()
                ->render();

        } catch (\Throwable $exception) {
            Log::error('Shetabit payment start failed', [
                'order_id' => $order->id ?? null,
                'exception' => $exception->getMessage(),
            ]);

            return redirect()->route('home.cart.index')
                ->withErrors([
                    'payment' => 'شروع پرداخت ناموفق بود. لطفاً دوباره تلاش کنید.',
                ]);
        }
    }

    public function verify(Request $request, Order $order)
    {
        abort_unless(
            (int) $order->user_id === (int) auth()->id(),
            403
        );

        $transaction = Transaction::where('order_id', $order->id)
            ->where('gateway_name', 'zarinpal')
            ->latest('id')
            ->first();

        if (!$transaction) {
            return redirect()->route('home.cart.index')
                ->withErrors([
                    'payment' => 'تراکنش این سفارش پیدا نشد.',
                ]);
        }

        if (
            (int) $transaction->status === 1 &&
            (int) $order->payment_status === 1
        ) {
            return response()->json([
                'success' => true,
                'message' => 'این سفارش قبلاً پرداخت شده است.',
                'reference_id' => $transaction->ref_id,
            ]);
        }

        if ($request->input('Status') !== 'OK') {
            return response()->json([
                'success' => false,
                'message' => 'پرداخت لغو شد یا ناموفق بود.',
                'order_id' => $order->id,
            ], 422);
        }

        try {
            $receipt = Payment::via('zarinpal')
                ->amount($transaction->amount)
                ->transactionId($transaction->token)
                ->verify();

            DB::transaction(function () use (
                $order,
                $transaction,
                $receipt
            ) {
                $lockedOrder = Order::whereKey($order->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $lockedTransaction = Transaction::whereKey($transaction->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if (
                    (int) $lockedTransaction->status === 1 &&
                    (int) $lockedOrder->payment_status === 1
                ) {
                    return;
                }

                $orderItems = OrderItem::where(
                    'order_id',
                    $lockedOrder->id
                )->get();

                foreach ($orderItems as $item) {
                    $variation = ProductVariation::whereKey(
                        $item->product_variation_id
                    )->lockForUpdate()->firstOrFail();

                    if ($variation->quantity < $item->quantity) {
                        throw new \RuntimeException(
                            'Insufficient stock for variation ' . $variation->id
                        );
                    }
                }

                foreach ($orderItems as $item) {
                    ProductVariation::whereKey(
                        $item->product_variation_id
                    )->decrement('quantity', $item->quantity);
                }

                $lockedTransaction->update([
                    'status' => 1,
                    'ref_id' => (string) $receipt->getReferenceId(),
                ]);

                $lockedOrder->update([
                    'payment_status' => 1,
                    'status' => 1,
                ]);
            });

            Cart::clear();
            session()->forget('coupon');

           return redirect()->route('home.index')->with('success', 'پرداخت با موفقیت انجام شد.');

        } catch (InvalidPaymentException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'تأیید پرداخت ناموفق بود.',
            ], 422);

        } catch (\Throwable $exception) {
            Log::error('Shetabit payment verification failed', [
                'order_id' => $order->id,
                'exception' => $exception->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'بررسی پرداخت ناموفق بود؛ سفارش نیاز به بررسی دارد.',
            ], 500);
        }
    }
}
