<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Ipe\Sdk\Facades\SmsIr;

class PaymentReceiptSmsChanel
{

    public function send($notifiable, Notification $notification)
    {
        // $api = new Ipe\Sdk\Facades\SmsIr(env('SMSIR_API_KEY')) ;
        // dd($notifiable , $notification->code );
        // dd($notification->order, $notification->ref_id, $notification->amount);


        $receptor = $notifiable->cellphone;
        $mobile = "09926245951"; // شماره موبایل گیرنده
        $templateId = 469494; // شناسه الگو
        $parameters = [
            [
                "name" => "Code",
                "value" => "11228",
                // مقادیر واقعی بزار برای ارسال پیام پرداخت این جا
                // "order" => "order",
                // "ref_id" => "ref_id",
                // "amount" => "amount",
            ]
        ];

        $response = SmsIr::verifySend($receptor, $templateId, $parameters);

        return "Done!";
    }
}
