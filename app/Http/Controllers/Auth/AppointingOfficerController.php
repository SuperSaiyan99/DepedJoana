<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointingOfficerController extends Controller
{
    public function redirectToAppointingOfficerHome()
    {
        return view('AppointingOfficer.home');
    }
}
