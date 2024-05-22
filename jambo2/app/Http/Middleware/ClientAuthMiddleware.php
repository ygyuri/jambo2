<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * This middleware ensures only authenticated clients can access specific routes.
 */
class ClientAuthMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // Check if the user is authenticated with the 'client' guard
    if (Auth::guard('client')->check()) {
      return $next($request);
    }

    // User is not authenticated, redirect to login with an error message
    return redirect('/login')->withErrors([
      'message' => 'Please log in to access this resource as a client.'
    ]);
  }
}