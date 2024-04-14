<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            if ($request->user()->role === 'customer') {
                return redirect()->route('customer.dashboard');
            } elseif ($request->user()->role === 'professional') {
                return redirect()->route('professional.dashboard');
            } elseif ($request->user()->role === 'vendor') {
                return redirect()->route('vendor.dashboard');
            } elseif ($request->user()->role === 'store') {
                return redirect()->route('store.dashboard');
            }
        }
        return $next($request);
    }
}
