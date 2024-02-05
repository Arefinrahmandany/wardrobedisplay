<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showloginForm(){

        return view('Front.login');

    }

    /**
     * Admin Login System
     */

    public function login(Request $request)
    {
        //validetion

        $this-> validate($request,[
            'auth' => 'required',
            'password' => 'required',
        ]);

        // Login System

        if(Auth::guard('admin') -> attempt(['username'=>$request->auth,'password'=>$request->password])
            ||Auth::guard('admin') -> attempt(['cell'=>$request->auth,'password'=>$request->password])
            ||Auth::guard('admin') -> attempt(['email'=>$request->auth,'password'=>$request->password]))
        {
            if( Auth::guard('admin')->user()-> trash == false && Auth::guard('admin')->user()->status == true )
            {
                return redirect()->route('dashboard.index');
            }
        }elseif(Auth::guard('user') -> attempt(['username'=>$request->auth,'password'=>$request->password])
        ||Auth::guard('user') -> attempt(['cell'=>$request->auth,'password'=>$request->password])
        ||Auth::guard('user') -> attempt(['email'=>$request->auth,'password'=>$request->password]))
        {
            return redirect()->route('home.index', Auth::guard('user')->user()->id);
        }else{
            return redirect()->route('admin.login.form')-> with('warning','Mistyped your User ID or Password Please check again');
        }

    }

    /**
     * Show Admin Login Page
     */

    public function logout(){

        Auth::guard('admin') -> logout();
        return redirect()->route('home.index');

    }
}
