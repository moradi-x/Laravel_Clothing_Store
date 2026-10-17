<?php

namespace App\Notifications;

use App\Channels\PaymentReceiptSmsChanel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceipt extends Notification
{
    use Queueable;

    public $order;
    public $amount;
    public $ref_id;


    /**
     * Create a new notification instance.
     */
    public function __construct($order, $amount, $ref_id)
    {
        $this->order = $order;
        $this->amount = $amount;
        $this->ref_id = $ref_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [PaymentReceiptSmsChanel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function ToSms($notifiable)
    {
        return [
            'order' => $this->order,
            'amount' => $this->amount,
            'ref_id' => $this->ref_id,

        ];
    }
}
