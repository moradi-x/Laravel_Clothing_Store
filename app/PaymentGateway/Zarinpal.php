<?php

namespace App\PaymentGateway;

use Darryldecode\Cart\Facades\CartFacade;

class Zarinpal extends Payment
{

    public function send($amounts, $description, $addressId)
    {

        $data = array(
            "merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
            "amount" => $amounts['paying_amount'] * 10,
            "callback_url" => route('home.payment_verify'),
            "description" => $description,
            "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
        );
        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);


        if ($err) {
            return ['error' => "cURL Error #:" . $err];
        } else {
            if (empty($result['errors'])) {
                // dd($result);
                if ($result['data']['code'] == 100) {

                    $createOrder = parent::createOrder($addressId, $amounts,  $result['data']['authority'], 'Zarinpal');
                    if (array_key_exists('error', $createOrder)) {
                        return $createOrder;
                    }

                    return ['success' =>  'https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']["authority"]];
                    // header('Location: https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
                }
            } else {
                echo 'Error Code: ' . $result['errors']['code'];
                echo 'message: ' . $result['errors']['message'];
            }
        }
    }

    public function verify($Authority, $amount)
    {

        if (request()->input('Status') !== 'OK') {
            return [
                'error' => 'پرداخت توسط کاربر لغو شد یا ناموفق بود.',
            ];
        }

        $data = array(
            "merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
            "authority" => $Authority,
            "amount" => ($amount * 10)
        );

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

                $updateOrder = parent::updateOrder($Authority, $result['data']['ref_id']);
                if (array_key_exists('error', $updateOrder)) {
                    return $updateOrder;
                }
                CartFacade::clear();

                return ['success' => 'Transation success. RefID:' . $result['data']['ref_id']];
            } else {
                // return ['error' => 'Transation success. RefID:' . $result['data']['ref_id']];

                // echo 'code: ' . $result['errors']['code'];
                // echo 'message: ' . $result['errors']['message'];

                return [
                    'error' => $result['errors']['message'] ?? $result['data']['message']  ?? 'پرداخت تأیید نشد.',
                    'code' => $result['errors']['code'] ?? $result['data']['code']  ?? null,
                    'response' => $result,
                ];
            }
        }
    }
}
