<?php

namespace App\PaymentGateway;

class Pay extends Payment
{
    public function send($amounts, $addressId)
    {
        $api = 'test';
        $amount = $amounts['paying_amount'] . '0';
        $redirect = route('home.payment_verify');
        $result = $this->sendRequest($api, $amount, $redirect);

        $result = json_decode($result);

        if ($result->status) {

            $createOrder = parent::createOrder($addressId, $amounts, $result->token, 'pay');

            if (array_key_exists('error', $createOrder)) {
                return $createOrder;
            }


            $go = "https://pay.ir/pg/$result->token";
            header("location: $go ");
        } else {
            return ['error' => $result->errorMessage];
        }
    }

    public function sendRequest($api, $amount, $redirect)
    {
        return $this->curl_post('https://pay.ir/pg/send', [
            'api' => $api,
            'amount' => $amount,
            'redirect' => $redirect,
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

    public function verify(){
        
    }
}
