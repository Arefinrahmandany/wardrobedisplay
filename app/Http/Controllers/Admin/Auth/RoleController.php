<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role:: latest() -> get();
        $permissions = Permission:: latest() -> get();
        return view('Admin.Auth.Roles.index',[
            'roles'         => $roles,
            'permissions'   => $permissions,
            'form_type'     => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //Validation
        $this-> validate($request, [
            'role_title'  => ['required']
        ]);

        //store role
        Role::create([
            'role_title'        => $request ->  role_title,
            'slug'              => Str::slug($request -> role_title),
            'permission_title'  => json_encode($request -> permission_title)
        ]);

        // redirect return Back
        return back()-> with('success','Role Create sucessfully');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit       = Role:: FindOrFail($id);
        $roles      = Role:: latest() -> get();
        $permissions= Permission:: latest() -> get();
        return view('Admin.Auth.Roles.index',[
            'roles'          => $roles,
            'permissions'   => $permissions,
            'form_type'     => 'edit',
            'edit'          => $edit

        ]);
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update_data = Role::findOrFail($id);

        //Update role
        $update_data -> update([
            'role_title'        => $request -> role_title,
            'permission_title'  => json_encode($request -> permission_title)
        ]);

        return redirect()->route('role.index')-> with('success-table','Role Update Successfully');
    }




}
