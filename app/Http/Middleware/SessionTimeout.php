<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    protected $timeout = 60; // 10 minutes in seconds

    public function handle($request, Closure $next)
    {
        if (Auth::check()) { // Ensure user is authenticated
            // Check if 'lastActivityTime' exists
            if (!session()->has('lastActivityTime')) {
                session(['lastActivityTime' => time()]);
            } elseif (time() - session('lastActivityTime') > $this->timeout) {
                // If session has expired, log out user and redirect to login page
                session()->forget('lastActivityTime');
                Auth::logout();

                return redirect('/login')->with('warning', 'You have been logged out due to inactivity.');
            }
            
            // Update 'lastActivityTime' with the current timestamp
            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
