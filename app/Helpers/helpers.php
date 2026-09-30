<?php

use Darryldecode\Cart\Facades\CartFacade;

$cartTotalSaleAmount = 0;
foreach (CartFacade::getContent() as  $value) {
    if ($item->attributes->is_sale) {
        $cartTotalSaleAmount +=  $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
    }
}
