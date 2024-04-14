<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
                } elseif ($request->user()->role === 'customer') {
                    return redirect(RouteServiceProvider::CUSTOMER_DASHBOARD);
                } elseif ($request->user()->role === 'professional') {
                    return redirect(RouteServiceProvider::PROFESSIONAL_DASHBOARD);
                } elseif ($request->user()->role === 'vendor') {
                    return redirect(RouteServiceProvider::VENDOR_DASHBOARD);
                } elseif ($request->user()->role === 'store') {
                    return redirect(RouteServiceProvider::STORE_DASHBOARD);
                }
            }
        }

        return $next($request);
    }
}
