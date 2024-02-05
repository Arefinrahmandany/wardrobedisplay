<?php

namespace App\Http\Controllers\Admin\Auth\Social;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    /**
     * Send Request For Facebook Login
     */
    public function sendFbLoginReq()
    {
        $user =  Socialite::driver('facebook')->user();

        $login_user = User::Where('oauth_id',$user)->first();

        if($login_user)
        {
            Auth::login($login_user);
            return redirect()->route('home.index', Auth::guard('user')->user()->id);
        }else{

            $user = User::create([
                'fName'     => $user-> name,
                'email'     => $user-> email,
                'cell'      => $user-> mobile,
                'oauth_id'  => $user-> id,
                'address'   => '',
                'slug'      => Str::slug($user -> name),
                'user_name' => '',
                'password'  => '',
            ]);

            Auth::login($user);
            return redirect()->route('home.index', Auth::guard('user')->user()->id);

        }

    }
}
