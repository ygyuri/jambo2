<?php

// app/Http/Middleware/AdminOrClient.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOrClient
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
        // Check if the user is authenticated as either admin or client
        if (Auth::guard('admin')->check() || Auth::guard('client')->check()) {
            return $next($request);
        }

        // If not authenticated, redirect to a login page or show an error
        return redirect('/login'); // Adjust the redirect path as necessary
    }
}