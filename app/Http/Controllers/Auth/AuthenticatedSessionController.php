<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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

        //add direct session sesuai role
        if ($request->user()->role === 'customer') {
            return redirect()->intended(RouteServiceProvider::CUSTOMER_DASHBOARD);
        } elseif (($request->user()->role === 'professional')) {
            return redirect()->intended(RouteServiceProvider::PROFESSIONAL_DASHBOARD);
        } elseif (($request->user()->role === 'vendor')) {
            return redirect()->intended(RouteServiceProvider::VENDOR_DASHBOARD);
        } elseif (($request->user()->role === 'store')) {
            return redirect()->intended(RouteServiceProvider::STORE_DASHBOARD);
        }
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
