<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function redirectToApplicantHome()
    {
        return view('applicants.home');
    }
}
