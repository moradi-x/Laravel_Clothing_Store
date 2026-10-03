<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('home.users_profile.addresses');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // چون 2 تا ولیدیت دارد این صفحه ارور هاش جدا باشه
        $request->validateWithBag( 'addressStore' ,  [
            'title' => ['required'],
            'cellphone' => ['required','iran_mobile'],
            'province_id' => ['required'],
            'city_id' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required','iran_postal_code'],
        ]);

        UserAddress::create([
            'user_id' => auth()->id() ,
            'title'=> $request->title ,
            'cellphone'=> $request->cellphone ,
            'province_id'=> $request->province_id ,
            'city_id'=> $request->ticity_idtle ,
            'address'=> $request->address ,
            'postal_code'=> $request->postal_code ,
        ]);

        

         alert()->success('ادرس مورد نظر ایجاد شد ', 'با تشکر');

        return redirect()->route('admin.addresses.index');

    }

    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
