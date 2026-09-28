<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{


    public function add(Product $product)
    {
        if (session()->has('compareProduct')) {

            if (in_array($product->id, session()->get('compareProduct'))) {
                alert()->warning('دقت کنید   ',  'محصول مورد نظر به لیست علاقه مندی های شما اضافه شده است  ');
                return redirect()->back();
            }

            session()->push('compareProduct', $product->id);
        } else {
            session()->put('compareProduct', [$product->id]);
        }

        alert()->success('با تشکر  ',  'محصول مورد نظر به لیست علاقه مندی های شما اضافه شد  ');
        return redirect()->back();
    }

    public function index()
    {
        if (session()->has('compareProduct')) {

            $products = Product::findOrFail(session()->get('compareProduct'));
            return view('home.compare.index', compact('products'));
        }

        alert()->warning('دقت کنید   ',  'در ابتدا باید محصولی برای مقایسه اضافه کنید   ');
        return redirect()->back();
    }

    public function remove($productId)
    {
        if (session()->has('compareProduct')) {

            foreach (session()->get('compareProduct') as $key => $item) {
                if ($item == $productId) {
                    session()->pull('compareProduct.' . $key);
                }
            }
            if (session()->get('compareProduct' == [])) {
                session()->forget('compareProduct');
                return redirect()->route('home.index');
            }

            return redirect()->route('home.compare.index');
        }
        alert()->warning('دقت کنید   ',  'در ابتدا باید محصولی برای مقایسه اضافه کنید   ');
        return redirect()->back();
    }
} 
