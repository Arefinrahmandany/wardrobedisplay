<?php

namespace App\Http\Controllers\Front\Users\Home;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserPageController extends Controller
{

    /**
     * Show User Registretion Page
     */
    public function userindex()
    {
        return view('Front.index',[
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // Check if the user with this email exists
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Log in the existing user
            auth()->login($existingUser, true);
        } else {
            // Create a new user
            $newUser = User::create([
                'fName' => $user->getName(),
                'email' => $user->getEmail(),
                // Add other fields as needed
            ]);

            // Log in the newly created user
            auth()->login($newUser, true);
        }

        // Redirect to the desired page
        return redirect()->route('home.index');
    }



    public function create()
    {
        return view('Front.Registration',[
            'form_type' => 'create'
        ]);
    }

    public function store(Request $request)
    {
        User::create([
            'fName'     => $request->fName,
            'slug'      => Str::slug($request -> fName),
            'user_name' => $request-> user_name,
            'password'  => Hash::make($request->password),
            'email'     => $request-> email,
            'cell'      => $request-> cell,
            'address'   => $request-> address,
        ]);

        return redirect()->route('admin.login.form');
    }

    public function show($id)
    {
        $user_data = User::findorFail($id);
        return view('Front.Registration',[
            'user_data' => $user_data,
            'form_type' => 'show'
        ]);
    }

    public function edit($id)
    {
        $user_data = User::findorfail($id);
        return view('Front.Registration',[
            'user_data' => $user_data,
            'form_type' => 'edit'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $update = User::findorFail($id);
        $update->update([
            'fName'     => $request->fName,
            'username'  => $request-> username,
            'email'     => $request-> email,
            'cell'      => $request-> cell,
            'address'   => $request-> address,
        ]);

        return redirect()->route('register.show',$id)->with('success','User Data Update Succefully, Thank you');
    }

    public function userLogout(){

        Auth::guard('user') -> logout();
        return redirect()->route('home.index');
    }

}
