<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_admin = Admin::latest()->where('trash',false)->where('status',true)->get();
        $roles = Role::latest()->get();
        return view('Admin.Auth.users.index',[
            'all_admin' => $all_admin,
            'roles' => $roles,
            'form_type' => ('create'),

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'name'      => ['required'],
            'email'     => ['required','unique:admins'],
            'cell'      => ['required','unique:admins'],
            'username'  => ['required'],
        ]);

        // password generate
        $pass_string = str_shuffle('qwertyuiopasdfghjklzxcvbnm1234567890');
        $pass = substr($pass_string, 10, 10);

        // Store data
        $user= Admin::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'cell'      => $request->cell,
            'username'  => $request->username,
            'location'  => $request->location,
            'dob'       => $request->dob,
            'bio'       => $request->bio,
            'photo'     => $request->photo,
            'role'      => $request->role,
            'password'  => Hash::make($pass),
        ]);

        return back()->with('success-table','user add successfully');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin      = Admin::findorFail($id);
        $all_admin  = Admin::latest()-> where('trash',false)->where('status',true)->get();
        $roles      = Role::latest()->get();
        return view('Admin.Auth.users.index',[
            'all_admin'     => $all_admin,
            'admin_data'    => $admin,
            'roles'         => $roles,
            'form_type'     => 'edit',
        ]);

    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update_data = Admin::findorfail($id);

        // data store to table
        $update_data -> update([
            'name'      => $request->name,
            'email'     => $request->email,
            'cell'      => $request->cell,
            'username'  => $request->username,
            'location'  => $request->location,
            'dob'       => $request->dob,
            'bio'       => $request->bio,
        ]);

        return redirect()->route('user.index')->with('success','Data successfully update');
    }

    /**
     * Status Update
     */

    public function updateStatus($id)
    {
        $data =  Admin::findorFail($id);

        if($data -> status){
            $data -> update([
                'status'=>false
            ]);
        }else{
            $data -> update([
                'status'=>true
            ]);
        }

        return back()->with('success-table','status update successfull');

    }

    public function updateTrash($id)
    {

    $data =  Admin::findorFail($id);

    if($data -> trash){
        $data -> update([
            'trash'=>false
        ]);
    }else{
        $data -> update([
            'trash'=>true
        ]);
    }

    return back()->with('success-table','Data Deleted successfull');

    }

    public function passwordChangeForm(){

        return view('backend.page.user.userSettings.passwordChange');

    }

    public function passwordChange(Request $request)
    {
        // Check Old Password
        if(!password_verify($request->old_password,Auth::guard('admin')->user()->password)){
            return back()->with('danger','Password not match');
        }
        $data = Admin::findorfail(Auth::guard('admin')->user()->id);
        $data -> UPDATE([
            'password' => Hash::make($request-> new_password)
        ]);
        return back()->with('success','Your Password change');

    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Admin::findorFail($id);
        $delete -> delete();

        return back() -> with('success-table','Data successfully Deleted');
    }


}
