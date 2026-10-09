<?php

namespace App\PaymentGateway;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\DB;

class Payment
{
    public function createOrder($addressId, $amounts, $token, $gateway_name)
    {
        try {
            DB::beginTransaction();

            $order =  Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
                'coupon_id' => session()->has('coupon') ?  session()->get('coupon.id')->id() : null,
                'total_amount' => $amounts['total_amount'],
                'delivery_amount' => $amounts['delivery_amount'],
                'coupon_amount' => $amounts['coupon_amount'],
                'paying_amount' => $amounts['paying_amount'],
                'payment_type' => 'online',
            ]);

            foreach (CartFacade::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->associatedModel->id,
                    'product_variation_id' => $item->attributes->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => ($item->price * $item->quantity)
                ]);
            }

            Transaction::create([
                'user_id' =>  auth()->id(),
                'order_id' => $order->id,
                'amount' => $amounts['paying_amount'],
                'token' => $token,
                'gateway_name' => $gateway_name,
            ]);

            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];

            // return redirect()->route('');
        }

        return ['succsess' => 'succsess! '];
    }

    public function updateOrder($token, $ref_id)
    {
        try {
            DB::beginTransaction();

            $transaction =  Transaction::where('token', $token)->firstOrFail();

            $transaction->update([
                'status' => 1,
                'ref_id' => $ref_id,
            ]);


            $order = Order::findOrFail($transaction->order_id);
            $order->update([
                'payment_status' => 1,
                'status' => 1,
            ]);

            foreach (CartFacade::getContent() as $item) {
                $variation = ProductVariation::find($item->attributes->id);
                $variation->update([
                    'quantity' => $variation->quantity - $item->quantity
                ]);
            }


            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return ['error' => $th->getMessage()];

            // return redirect()->route('');
        }
    }
}
