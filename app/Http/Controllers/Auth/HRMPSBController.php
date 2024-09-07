<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HRMPSBController extends Controller
{
    public function redirectToHRMPSBHome()
    {
        return view('HRMPSB.home');
    }
}
