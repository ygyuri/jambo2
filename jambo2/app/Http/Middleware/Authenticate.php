<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
        protected function redirectTo(Request $request): ?string
    {
        // Check if the user is attempting to access an admin route
        if ($request->is('admin/*')) {
            // Redirect admin users to the admin login page
            return $request->expectsJson() ? null : route('admin.login');
        } elseif ($request->is('client/*')) {
            // Redirect client users to the client login page
            return $request->expectsJson() ? null : route('client.login');
        }

        // If the user is accessing neither admin nor client routes, redirect to a default login page or homepage
        return $request->expectsJson() ? null : route('landing');
    }

}
