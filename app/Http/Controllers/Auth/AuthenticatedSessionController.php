<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->role == 'superadmin') {
            return redirect('super-admin/home');
        } else if ($request->user()->role == 'hrmo') {
            return redirect('management-officer/home');
        } else if ($request->user()->role == 'hrmpsb') {
            return redirect('selection-board/home');
        } else if ($request->user()->role == 'appointing_officer') {
            return redirect('appointing-officer/home');
        } else if ($request->user()->role == 'applicant') {
            return redirect('applicant/home');
        }

        return redirect()->intended(route('/'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
