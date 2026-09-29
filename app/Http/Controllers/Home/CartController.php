<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

// use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'qtybutton' => ['required'],
        ]);

        $product = Product::findOrFail($request->product_id);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qtybutton > $productVariation->quantity) {

            alert()->error('دقت کنید   ',  ' تعداد وارد شده از محصول درست نمی باشد  ');
            return redirect()->back();
        }

        $rowId = $product->id . '-' .  $productVariation->id;

        if (Cart::get($rowId) == null ) {
            Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $productVariation->is_sale ? $productVariation->sale_price : $productVariation->price,
                'quantity' => $request->qtybutton,
                'attributes' => $productVariation->toArray(),
                'associatedModel' => $product
            ));
        } else {
            alert()->warning('دقت کنید   ',  ' محصول مورد نظر شما به سبد خرید اضافه شده است  ');
            return redirect()->back();
        }
        alert()->success('با تشکر ',  ' محصول مورد نظر شما به سبد خرید اضافه شد  ');
        return redirect()->back();

        // dd($request->all());
    }
}
