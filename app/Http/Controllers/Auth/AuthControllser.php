<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;

class AuthControllser extends Controller
{
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect() ;
    }
}
