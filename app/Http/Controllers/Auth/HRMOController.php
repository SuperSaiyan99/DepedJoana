<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HRMOController extends Controller
{
    public function redirectToHRMOHome()
    {
        return view('HRMO.home');
    }
}
