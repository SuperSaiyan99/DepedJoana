<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback ($provider)
    {
        $SocialUser = Socialite::driver($provider)->user();

        //dd($SocialUser);

        $user = User::updateOrCreate([
            'provider_id' => $SocialUser->id,
            'provider' => $provider,
        ],
         [
            'name' => $SocialUser->name,
            'email' => $SocialUser->email,
             'username' => User::generateUsername($SocialUser->nickname),
            'provider_token' => $SocialUser->token,
            'provider_refresh_token' => $SocialUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/register');
    }
}
