<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereRoleNot(['super_admin', 'admin', 'user'])
            ->whenSearch(request()->search)->paginate(5);
        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.edit');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles',
            'slug' => 'required|min:3|unique:roles',
        ]);
        Role::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.roles.index');
    }


    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required',Rule::unique('roles')->ignore($role->id),],
            'slug' => ['required',Rule::unique('roles')->ignore($role->id),],
        ]);
        $role->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.roles.index');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.roles.index');

    }
}
