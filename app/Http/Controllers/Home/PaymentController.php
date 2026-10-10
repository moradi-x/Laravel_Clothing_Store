<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\PaymentGateway\Pay;
use App\PaymentGateway\Zarinpal;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'address_id' => ['required'],
            'payment_method' => ['required'],
        ]);

        if ($validator->fails()) {
            alert()->error('دقت کنید ',  'انتخاب ادرس الزامی میباشد');
            return redirect()->back();
        }

        $checkCart = $this->checkCart();
        if (array_key_exists('error', $checkCart)) {
            alert()->error('دقت کنید ',  $checkCart['error']);
            return redirect()->route('home.index');
        }

        $amounts = $this->getAmounts();
        if (array_key_exists('error', $amounts)) {
            alert()->error('دقت کنید ',  $amounts['error']);
            return redirect()->route('home.index');
        }


        // درگاه پرداخت پی
        if ($request->payment_method == 'pay') {

            $PayGatway = new Pay();
            $PayGatwayResult =  $PayGatway->send($amounts, $request->address_id);
            if (array_key_exists('error', $PayGatwayResult)) {
                alert()->error($PayGatwayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            } else {
                return redirect()->to($PayGatwayResult['success']);
            }
        }

        // درگاه پرداخت زرین پال
        if ($request->payment_method == 'zarinpal') {
            $zarinpalGatway = new Zarinpal();
            $zarinpalGatwayResult =  $zarinpalGatway->send(
                $amounts,
                'خرید تستی',
                $request->address_id
            );
            if (array_key_exists('error', $zarinpalGatwayResult)) {
                alert()->error($zarinpalGatwayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            } else {
                return redirect()->to($zarinpalGatwayResult['success']);
            }
        }

        alert()->error('دقت کنید ',  'درگاه پرداخت انتخابی درست نمیباشد ');
        return redirect()->back();
    }

    public function paymentVerify(Request $request, $gatwayName)
    {

        if ($gatwayName == 'pay') {
            $PayGatway = new Pay();
            $PayGatwayResult =  $PayGatway->verify($request->token, $request->status);
            if (array_key_exists('error', $PayGatwayResult)) {
                alert()->error($PayGatwayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            } else {
                alert()->success($PayGatwayResult['success'], 'با تشکر');
                return redirect()->route('home.index');
            }
        }


        // درگاه پرداخت زرین پال
        if ($gatwayName == 'zarinpal') {

            $amounts = $this->getAmounts();
            if (array_key_exists('error', $amounts)) {
                alert()->error('دقت کنید ',  $amounts['error']);
                return redirect()->route('home.index');
            }
            $zarinpalGatway  = new Zarinpal();
            $zarinpalGatwayResult =  $zarinpalGatway->verify($request->Authority, $amounts['paying_amount']);
            if (array_key_exists('error', $zarinpalGatwayResult)) {
                alert()->error($zarinpalGatwayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            } else {
                alert()->success($zarinpalGatwayResult['success'], 'با تشکر');
                return redirect()->route('home.index');
            }
        }
        alert()->error('دقت کنید ',  'درگاه پرداخت انتخابی درست نمیباشد ');
        return redirect()->route('home.arders.checkout');
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
}
