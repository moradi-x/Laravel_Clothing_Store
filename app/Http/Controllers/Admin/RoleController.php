<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::oldest()->paginate(20);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate(rules: [
            "name" => ['required'],
            "display_name" => ['required']
        ]);


        try {
            DB::beginTransaction();

            $role =  Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'guard_name' => 'Web',
            ]);
            $permission = $request->except('_token', 'display_name', 'name');
            // dd($permission);
            $role->givePermissionTo($permission);

            DB::commit();
        } catch (\Throwable $ex) {
            DB::rollBack();

            alert()->error('مشکل در ایجاد  محصول',  $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }


        alert()->success('نفش مورد نظر با موفقیت ایجاد شد', 'با تشکر');

        return redirect()->route('admin.roles.index');
    }

    public function edit(Permission $permission)
    {
        return view('admin.roles.edit', compact('permission'));
    }


    public function update(Permission $permission, Request $request)
    {

        $request->validate([
            'display_name' => ['required'],
            'name' => ['required'],
        ]);

        $permission->update([
            'display_name' => $request->display_name,
            'name' => $request->name,
        ]);

        alert()->success('پرمیژن مورد نظر با موفقیت ویراش شد', 'با تشکر');

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }
}
