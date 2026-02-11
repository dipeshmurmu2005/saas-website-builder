<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $name = $user->name;
        $email = $user->email;
        $platformUser = User::where('email', $email)->first();
        if ($platformUser) {
            Auth::login($platformUser);
            return redirect()->intended(route('platform.home'));
        } else {
            dd('create new');
        }
    }
}
