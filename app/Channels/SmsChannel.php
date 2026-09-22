<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Ipe\Sdk\Facades\SmsIr;

class SmsChannel
{

    public function send($notifiable, Notification $notification)
    {
        // $api = new Ipe\Sdk\Facades\SmsIr(env('SMSIR_API_KEY')) ;
        // dd($notifiable , $notification->code );

        $receptor = $notifiable->cellphone;
        $mobile = "09926245951"; // شماره موبایل گیرنده
        $templateId = 469494; // شناسه الگو
        $parameters = [
            [
                "name" => "Code",
                "value" => "11228"
            ]
        ];

        $response = SmsIr::verifySend($receptor, $templateId, $parameters);
    }
}
