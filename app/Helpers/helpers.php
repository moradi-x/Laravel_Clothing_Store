<?php

use App\Models\Coupon;
use App\Models\Order;
use Carbon\Carbon;
use Darryldecode\Cart\Facades\CartFacade;

function cartTotalSaleAmount()
{
    $cartTotalSaleAmount = 0;
    foreach (CartFacade::getContent() as  $item) {
        if ($item->attributes->is_sale) {
            $cartTotalSaleAmount +=  $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
        }
    }
    return $cartTotalSaleAmount;
}


function cartTotalDeliveryAmount()
{
    $cartTotalDeliveryAmount = 0;
    foreach (CartFacade::getContent() as  $item) {
        $cartTotalDeliveryAmount +=  $item->associatedModel->delivery_amount;
    }
    return $cartTotalDeliveryAmount;
}


function checkCoupone($code)
{
    $coupon =  Coupon::where('code', $code)->where('expired_at',  '>', Carbon::now())->first();

    if ($coupon == null) {
        return ['error' => 'کد تخفیف وارد شده وجود ندارد '];
    }

    if (Order::where('user_id', auth()->id())->where('coupon_id', $coupon->id)->where('payment_status', 1)->exists()) {
        return ['error' => 'شما قبلا از این کد تخفیف استفاده کردید   '];
    };

    if ($coupon->getRawOriginal('type') == 'amount') {
        session()->put('coupon', ['coupon' => $coupon->code, 'amount' => $coupon->amount]);
    } else {

        $total = CartFacade::getTotal();
        $amount = (($total *  $coupon->percentage) / 100) > $coupon->max_percentage_amount
            ? $coupon->max_percentage_amount  : (($total *  $coupon->percentage) / 100);
        session()->put('coupon', ['coupon' => $coupon->code, 'amount' => $amount]);
    }
    return ['success' => 'کد تخفیف برای شما ثبت شد '];
}

function cartTotalAmount()
{

    if (session()->has('coupon')) {
        if (session()->get('coupon.amount') > ( CartFacade::getTotal() +  cartTotalDeliveryAmount())  ) {
            return 0;
        } else {
            return (CartFacade::getTotal() +  cartTotalDeliveryAmount()) - session()->get('coupon.amount');
        }
    } else {

        return  CartFacade::getTotal() +  cartTotalDeliveryAmount();
    }
}
