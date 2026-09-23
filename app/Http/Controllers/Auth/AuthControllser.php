<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OTPSms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Socialite;

class AuthControllser extends Controller
{

    // احراز هویت با اکانت گوگل outh
    // public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //     try {
    //         $Socialite_user =  Socialite::driver($provider)->user();
    //     } catch (\Exception $ex) {
    //         return redirect()->route('login');
    //     }

    //     $user = User::where('email', $Socialite_user->getEmail())->first();
    //     if (! $user) {
    //         $user =   User::create([
    //             'name' => $Socialite_user->getName(),
    //             'provider_name' => $provider,
    //             'avatar' => $Socialite_user->getAvatar(),
    //             'email' => $Socialite_user->getEmail(),
    //             'password' => Hash::make($Socialite_user->getId()),
    //             'email_verified_at' =>  Carbon::now(),
    //         ]);
    //     }
    //     Auth::login($user, $remember = true);
    //     alert()->success('تشکر',  'ورود شما موفقیت امیز بود')->persistent('حله');

    //     return redirect()->route('home.index');
    // }

    // احراز هویت با otp  سامانه پیامکی
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.login');
        };
        $request->validate([
            'cellphone' => ['required', 'iran_mobile'],
        ]);


        try {
            $user = User::where('cellphone', $request->cellphone)->first();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DDKVDsnzljbvlkCFYKJHBYtY(^^FnbvJG$^cv');

            if ($user) {
                $user->update([
                    'otp' =>  $OTPCode,
                    'login_token' => $loginToken
                ]);
            } else {
                $user = User::create([
                    'cellphone' => $request->cellphone,
                    'otp' =>  $OTPCode,
                    'login_token' => $loginToken
                ]);
            }
            $user->notify(new OTPSms($OTPCode));
            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }

    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
            'login_token' => ['required'],
        ]);

        try {

            $user = User::where('login_token', $request->login_token)->firstOrFail();

            if ($user->otp == $request->otp) {
                auth()->login($user, $remember = true);
                return response(["ورود با موفقیت انجام شد"], 200);
            } else {
                return response(['errors' => ['otp' => ['کد تایید نادرست است']]], 422);
            }
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }

    public function resendOtp(Request $request)
    {

        $request->validate([
            'login_token' => ['required']
        ]);


        try {
            $user = User::where('login_token', $request->login_token)->firstOrFail();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DDKVDsnzljbvlkCFYKJHBYtY(^^FnbvJG$^cv');

            $user->update([
                'otp' =>  $OTPCode,
                'login_token' => $loginToken
            ]);

            $user->notify(new OTPSms($OTPCode));
            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        };
    }
}
