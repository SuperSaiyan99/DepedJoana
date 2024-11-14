<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;


class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $SocialUser = Socialite::driver($provider)->user();

        //dd($SocialUser);

        # TODO: PUT THIS ON THE ACCOUNT CREATION, NOT LOGIN
        $user = User::UpdateOrCreate([
            'provider_id' => $SocialUser->id,
            'provider' => $provider,
        ],
            [
                'name' => $SocialUser->name,
                'email' => $SocialUser->email,
                'provider_token' => $SocialUser->token,
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'provider_refresh_token' => $SocialUser->refreshToken,
            ]);

        #dd($user->id);

        # Find the applicant associated with the user
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId($user->id);


        # If no applicant found, create one using the ApplicantService
        if (!$applicantId) {

            $applicantService = new \App\Services\Applicant\ApplicantService();
            $applicantService->createApplicantWithCode($user->id);
            
        }

        $roleRoutes = [
            'applicant' => 'applicants.home',
            'superadmin' => 'super-admin.home',
            'hrmpsb' => 'selection-board.home',
            'hrmo' => 'management-officer.home',
            'appointing_officer' => 'appointing-officer.home',
        ];

        \Auth::login($user);

        $userRole = \Auth::user()->role ? \Auth::user()->role : null;

        if (!is_null($userRole)) {
            return redirect()->route($roleRoutes[$userRole]);
        }

        return redirect('/login')->with('error', 'Something went wrong');
    }
}
