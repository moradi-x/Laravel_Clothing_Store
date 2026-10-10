<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    protected $table = "orders";
    protected $guarded = [];

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '0':
                $status = ' در انتظار پرداخت ';
                break;
            case '1':
                $status = ' پرداخت  شده ';
                break;
        }

        return $status;
    }

    public function getPaymentTypeAttribute($payment_type)
    {
        switch ($payment_type) {
            case 'pos':
                $payment_type = 'دستگاه pos';
                break;
            case 'online':
                $payment_type = ' اینترنتی   ';
                break;
        }

        return $payment_type;
    }

    public function getPaymentStatusAttribute($payment_status)
    {
        switch ($payment_status) {
            case '0':
                $payment_status = 'نا موفق';
                break;
            case '1':
                $payment_status = ' موفق';
                break;
        }

        return $payment_status;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
