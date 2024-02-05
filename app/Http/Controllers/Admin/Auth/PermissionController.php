<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * load permision page
    */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('Admin.Auth.Permissions.index',[
            'all_permission' => $permissions,
            'form_type'     => 'create'
        ]);
    }

    /**
    * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $this-> validate($request,[
            'permission_title' => 'required|unique:permissions'
        ]);
        // data store to table
        Permission::create([
            'permission_title'  => $request -> permission_title,
            'slug'              => Str::slug($request -> permission_title)
        ]);
        //redirect to back same page
        return back()->with('success','Permission insert successfully');
    }

    /**
     * Edit permision Data
    */
    public function edit(string $id)
    {

        $permissions    =   Permission::latest()->get();
        $per            =   Permission::findOrFail($id);
        return view('Admin.Auth.Permissions.index',[
            'all_permission'=> $permissions,
            'form_type'     => 'edit',
            'edit'          => $per

        ]);
    }

    /**
     * load permision page
    */
    public function update(Request $request, $id)
    {
        $update_data = Permission::findOrFail($id);
        $update_data -> update([
            'permission_title'  => $request -> permission_title,
            'slug'              => Str::slug($request -> permission_title)
        ]);
        //redirect to Route page
        return redirect()->route('permission.index')->with('success','Data successfully updated');
    }

    /**
    * Delete permision data
    */
    public function destroy(string $id){

        $delete = Permission::findorFail($id);
        $delete -> delete();
        //redirect to Route page
        return back()->with('danger-table','Data successfully Deleted');

    }

}
