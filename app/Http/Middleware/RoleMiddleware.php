<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // public function handle(Request $request, Closure $next): mixed
    // {
    //     $prefix = $request->segment(1); // e.g., 'admin', 'transporter', 'client'

    //     if (!Auth::check()) {
    //         // redirect to correct login route based on prefix
    //         return redirect()->route("{$prefix}.login");
    //     }

    //     // Check role matches route prefix
    //     if (Auth::user()->role !== $prefix) {
    //         return response()->view('errors.403', [], 403);
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): mixed
    {
        $prefix = $request->segment(1); // first segment of the URL

        if (!Auth::check()) {
            return redirect()->route("{$prefix}.login");
        }

        $userRole = Auth::user()->role;

        // Map vendor → vendorz
        if ($userRole === 'vendor') {
            $userRole .= 'z';
        }

        // Check role matches route prefix
        if ($userRole !== $prefix) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
