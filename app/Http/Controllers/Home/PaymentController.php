<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\PaymentGateway\Pay;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        // $data = array(
        //     "merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
        //     "amount" => 100000,
        //     "callback_url" => route('home.payment_verify'),
        //     "description" => "خرید تست",
        //     "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
        // );
        // $jsonData = json_encode($data);
        // $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/request.json');
        // curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Content-Length: ' . strlen($jsonData)
        // ));

        // $result = curl_exec($ch);
        // $err = curl_error($ch);
        // $result = json_decode($result, true, JSON_PRETTY_PRINT);
        // curl_close($ch);


        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     if (empty($result['errors'])) {
        //         if ($result['data']['code'] == 100) {
        //             // header('Location: https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
        //             return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
        //         }
        //     } else {
        //         echo 'Error Code: ' . $result['errors']['code'];
        //         echo 'message: ' . $result['errors']['message'];
        //     }
        // }






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
        // dd($amounts);
        $PayGatway = new Pay();
        $PayGatwayResult =  $PayGatway->send($amounts,$request->address_id);
         if (array_key_exists('error', $PayGatwayResult)) {
            alert()->error($PayGatwayResult['error' , 'دقت کنید'])->persistent('حله') ;
                return redirect()->back() ;
            }
    
    }

    public function paymentVerify(Request $request)
    {


        $Authority = $request->Authority ;
        $data = array("merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx", "authority" => $Authority, "amount" => 100000);
        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result['data']['code'] == 100) {
                echo 'Transation success. RefID:' . $result['data']['ref_id'];
            } else {
                echo 'code: ' . $result['errors']['code'];
                echo 'message: ' . $result['errors']['message'];
            }
        }





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

  

    public function verify($api, $token)
    {
        // return $this->curl_post('https://pay.ir/pg/verify', [
        //     'api'   => $api,
        //     'token' => $token,
        // ]);
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
