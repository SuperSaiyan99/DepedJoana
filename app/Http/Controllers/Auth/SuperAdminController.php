<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function redirectToSuperAdminHome()
    {
        return view('SuperAdmin.home');
    }
}
