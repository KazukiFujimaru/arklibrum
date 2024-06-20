<?php

//Pembuatan admin role
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if the authenticated user is an admin
        if (!Auth::user()->isAdmin()) {
            // Redirect to a different route if the user is not an admin
            return redirect()->route('dashboard');
        }

        // Allow the request to proceed if the user is an admin
        return $next($request);
    }
}
