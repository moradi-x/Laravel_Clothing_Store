<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'payment_methode' => ['required'],
            'address_id' => ['required'],
        ]);

        if ($validator->fails()) {
            alert()->error('دقت کنید ', 'انتخاب ادرس الزامی میباشد');
            return redirect()->back();
        }

        $api = 'test';
        $amount = "10000";
        $redirect = route('home.payment_verify');
        $result = $this->send($api, $amount, $redirect);
        $result = json_decode($result);

        if ($result->status) {
            $go = "https://pay.ir/pg/$result->token";
            header("location : $go");
        } else {
            echo $result->errorMessage;
        }
    }

    public function paymentVerify(Request $request)
    {
        $api = 'test';
        $token = $request->token;
        $result = json_decode($this->verify($api, $token));
        if (isset($result->status)) {
            if ($result->status == 1) {
                echo "<h1>تراكنش با موفقيت انجام شد</h1>";
            } else {
                echo "<h1>تراكنش با خطا مواجه شد</h1>";
            }
        } else {
            if ($_GET['status'] == 0) {
                echo "<h1>تراكنش با خطا مواجه شد</h1>";
            }
        }
    }

    public function send($api, $amount, $redirect)
    {
        return $this->curl_post('https://pay.ir/pg/send', [
            'api' => $api,
            'amount' => $amount,
            'redirect' => $redirect,
            'mobile' => $mobile,
            'factorNumber' => $factorNumber,
            'description' => $description,
        ]);
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
}
