<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::oldest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

     public function update( Request $request , User $user)
    {

        $request->validate([
            'name' => ['required'],
        ]);

        $user->update([
            'name' => $request->name ,
            'cellphone' => $request->cellphone ,
        ]);

        alert()->success('کاربر مورد نظر با موفقیت ویرایش شد', 'با تشکر');

        return redirect()->route('admin.users.index');

    }
}
