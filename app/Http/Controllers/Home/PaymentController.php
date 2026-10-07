<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {




        // // dd($request->all());
        // $validator = Validator::make($request->all(), [

        //     'address_id' => ['required'],
        //     'payment_method' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     alert()->error('دقت کنید ',  'انتخاب ادرس الزامی میباشد');
        //     return redirect()->back();
        // }

        // $checkCart = $this->checkCart();
        // if (array_key_exists('error', $checkCart)) {
        //     alert()->error('دقت کنید ',  $checkCart['error']);
        //     return redirect()->route('home.index');
        // }

        // $amounts = $this->getAmounts();
        // if (array_key_exists('error', $amounts)) {
        //     alert()->error('دقت کنید ',  $amounts['error']);
        //     return redirect()->route('home.index');
        // }
        // // dd($amounts);
        // $api = 'test';
        // $amount = $amounts['paying_amount'];
        // $redirect = route('home.payment_verify');
        // $result = $this->send($api, $amount, $redirect);

        // $result = json_decode($result);

        // if ($result->status) {

        //     $createOrder = $this->createOrder($request->address_id, $amounts, $result->token, 'pay');

        //     if (array_key_exists('error', $createOrder)) {
        //         alert()->error('دقت کنید ',  $createOrder['error']);
        //         return redirect()->back();
        //     }
        //     $go = "https://pay.ir/pg/$result->token";
        //     return redirect()->to($go);
        // } else {

        //     alert()->error('دقت کنید ',  $result->errorMessage);
        //     return redirect()->back();
        // }
    }

    public function paymentVerify(Request $request)
    {
        // $api = 'test';
        // $token = $request->token;
        // $result = json_decode($this->verify($api, $token));
        // if (isset($result->status)) {
        //     if ($result->status == 1) {

        //         $updateOrder = $this->updateOrder($token, $result->transId);
        //         if (array_key_exists('error', $updateOrder)) {
        //             alert()->error('دقت کنید ',  $updateOrder['error']);
        //             return redirect()->back();
        //         }
        //         CartFacade::clear();
        //         alert()->success(  'با تشکر', 
        //           ' پرداخت با وفقیت انجام شد'
        //           . $result->transId  . 'شماره تراکنش'
        //         );
        //         return redirect()->route('home.index');
        //     } else {
                
        //         alert()->error(  'با تشکر', 
        //           ' پرداخت با خطا مواجه  شد'
        //           . $result->status  . 'وضعیت  '
        //         );
        //         return redirect()->route('home.index');
        //     }
        // } else {
        //     if ($request->status == 0) {
        //         alert()->error(  'با تشکر', 
        //           ' پرداخت با خطا مواجه  شد'
        //           . $request->status  . 'وضعیت  '
        //         );
        //         return redirect()->route('home.index');
        //     }
        // }
    }

    public function send($api, $amount, $redirect)
    {
        // return $this->curl_post('https://pay.ir/pg/send', [
        //     'api' => $api,
        //     'amount' => $amount,
        //     'redirect' => $redirect,
        // ]);
    }


    public function curl_post($url, $params)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $res = curl_exec($ch);

        curl_close($ch);

        return $res;
    }

    public function verify($api, $token)
    {
        return $this->curl_post('https://pay.ir/pg/verify', [
            'api'   => $api,
            'token' => $token,
        ]);
    }

    public function checkCart()
    {
        if (CartFacade::isEmpty()) {
            return ['error' => 'سبد خرید شما خالی میباشد '];
        }

        foreach (CartFacade::getContent() as $item) {

            $variation = ProductVariation::find($item->attributes->id);
            $price = $variation->is_sale ?  $variation->sale_price : $variation->price;

            if ($item->price != $price) {
                CartFacade::clear();
                return ['error' => 'قیمت محصول تغییر پیدا کرد '];
            }

            if ($item->quantity > $variation->quantity) {
                CartFacade::clear();
                return ['error' => 'تعداد محصول تغییر پیدا کرد '];
            }

            return ['succsess' => 'succsess! '];

            // dd($variation);
        }
    }

    public function getAmounts()
    {

        if (session()->has('coupon')) {

            $checkCoupone = checkCoupone(session()->get('coupon.code'));
            if (array_key_exists('error', $checkCoupone)) {
                return $checkCoupone;
            }
        }

        return [
            'total_amount'  => (CartFacade::getTotal() + cartTotalSaleAmount()),
            'delivery_amount' => cartTotalDeliveryAmount(),
            'coupon_amount' => session()->has('coupon') ? session()->get('coupon.amount') : 0,
            'paying_amount' => cartTotalAmount(),
        ];
    }

    public function createOrder($addressId, $amounts, $token, $gateway_name)
    {
        try {
            DB::beginTransaction();

            $order =  Order::create([
                'user_id' => auth()->id,
                'address_id' => $addressId,
                'coupon_id' => session()->has('coupon') ?  session()->get('coupon.id')->id() : null,
                'total_amount' => $amounts['total_amount'],
                'delivery_amount' => $amounts['delivery_amount'],
                'coupon_amount' => $amounts['coupon_amount'],
                'paying_amount' => $amounts['paying_amount'],
                'payment_type' => 'online',
            ]);

            foreach (CartFacade::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->associatedModel->id,
                    'product_variation_id' => $item->attributes->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => ($item->price * $item->quantity)
                ]);
            }

            Transaction::create([
                'user_id' =>  auth()->id,
                'order_id' => $order->id,
                'amount' => $amounts['paying_amount'],
                'tocken' => $token,
                'gateway_name' => $gateway_name,
            ]);

            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];

            // return redirect()->route('');
        }

        return ['succsess' => 'succsess! '];
    }

    public function updateOrder($token, $ref_id)
    {
        try {
            DB::beginTransaction();

            $transaction =  Transaction::where('token', $token)->firstOrFail();

            $transaction->update([
                'status' => 1,
                'ref_id' => $ref_id,
            ]);


            $order = Order::findOrFail($transaction->order_id);
            $order->update([
                'payment_status' => 1,
                'status' => 1,
            ]);

            foreach (CartFacade::getContent() as $item) {
                $variation = ProductVariation::find($item->attributes->id);
                $variation->update([
                    'quantity' => $variation->quantity - $item->quantity
                ]);
            }


            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];

            // return redirect()->route('');
        }
    }
}
