<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {

        $coupons = Coupon::oldest()->paginate(20);
        return view('admin.coupons.index', compact('coupons'));
    }
    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'code' => ['required', 'unique:coupons,code'],
            'type' => ['required'],
            'amount' => ['required_if:type,=,amount'],
            'percentage' => ['required_if:type,=,percentage'],
            'max_percentage_amount' => ['required_if:type,=,percentage'],
            'expired_at' => ['required'],
            // 'description' => ['required'],
        ]);

        Coupon::create([
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type,
            'amount' => $request->amount,
            'percentage' => $request->percentage,
            'max_percentage_amount' => $request->max_percentage_amount,
            'expired_at' => Verta::parseFormat(
                'Y/m/d H:i:s',
                str_replace('-', '/', $request->expired_at)
            )->formatGregorian('Y-m-d'),
        ]);

        alert()->success('کوپن مورد نظر ایجاد شد', 'با تشکر');

        return redirect()->route('admin.coupons.index');
    }

    public function show(Coupon $coupon)
    {
        return view('admin.coupons.show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required',  'unique:coupons,code,' . $coupon->id],
            'type' => ['required'],
            'amount' => ['required_if:type,amount'],
            'percentage' => ['required_if:type,percentage'],
            'max_percentage_amount' => ['required_if:type,percentage'],
            'expired_at' => ['required'],
        ]);

        $coupon->update([
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type,
            'amount' => $request->amount,
            'percentage' => $request->percentage,
            'max_percentage_amount' => $request->max_percentage_amount,
            'expired_at' => Verta::parseFormat(
                'Y/m/d H:i:s',
                str_replace('-', '/', $request->expired_at)
            )->formatGregorian('Y-m-d'),
        ]);

        alert()->success('کوپن مورد نظر ویرایش شد', 'با تشکر');

        return redirect()->route('admin.coupons.index');
    }


    public function destroy(string $id)
    {
        //
    }
}
