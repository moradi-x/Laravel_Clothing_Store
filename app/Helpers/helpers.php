<?php

use Darryldecode\Cart\Facades\CartFacade;

function cartTotalSaleAmount()
{
    $cartTotalSaleAmount = 0;
    foreach (CartFacade::getContent() as  $item) {
        if ($item->attributes->is_sale) {
            $cartTotalSaleAmount +=  $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
        }
    }
    return $cartTotalSaleAmount ;
}


function cartTotalDeliveryAmount()
{
    $cartTotalDeliveryAmount = 0;
    foreach (CartFacade::getContent() as  $item) {
            $cartTotalDeliveryAmount +=  $item->associatedModel->delivery_amount  ;
    }
    return $cartTotalDeliveryAmount ;
}