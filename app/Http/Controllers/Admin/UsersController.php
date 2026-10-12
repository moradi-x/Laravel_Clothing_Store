<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::oldest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'cellphone' => $request->cellphone,
            ]);

            

            // ثبت نقش انتخاب‌شده
            $user->syncRoles($request->role);

            // $user->syncRoles([]);
            // $user->assignRole('admin');

            // فقط مجوزهای معتبر با گارد web
            $permissions = $request->except('_token', 'cellphone', 'role', 'name', '_method');

            // فقط مجوزهای معتبر با گارد web
            // $permissions = Permission::where('guard_name', 'web')
            //     ->whereIn('name', array_keys($request->except(
            //         '_token',
            //         'cellphone',
            //         'role',
            //         'name',
            //         '_method'
            //     )))->pluck('name')->all();


            $user->syncPermissions($permissions);


            DB::commit();
        } catch (\Throwable $ex) {
            DB::rollBack();

            alert()->error('مشکل در ویرایش نقش  ',  $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('کاربر مورد نظر با موفقیت ویرایش شد', 'با تشکر');

        return redirect()->route('admin.users.index');
    }
}
