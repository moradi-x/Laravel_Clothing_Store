<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::oldest()->paginate(20);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate(rules: [
            "name" => ['required'],
            "display_name" => ['required']
        ]);

        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'guard_name' => 'Web',
        ]);

        alert()->success('پرمیژن مورد نظر با موفقیت ایجاد شد', 'با تشکر');

        return redirect()->route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
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

        return redirect()->route('admin.permissions.index');
    }
}
