<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Socialite;

class AuthControllser extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $Socialite_user =  Socialite::driver($provider)->user();
        } catch (\Exception $ex) {
            return redirect()->route('login');
        }

        $user = User::where('email', $Socialite_user->getEmail())->first();
        if (! $user) {
            $user =   User::create([
                'name' => $Socialite_user->getName(),
            'provider_name' => $provider,
                'avatar' => $Socialite_user->getAvatar(),
                'email' => $Socialite_user->getEmail(),
                'password' => Hash::make($Socialite_user->getId()),
                'email_verified_at' =>  Carbon::now(),
            ]);
        }
        Auth::login($user, $remember = true);
        alert()->success('تشکر',  'ورود شما موفقیت امیز بود')->persistent('حله');

        return redirect()->route('home.index');
    }
}
