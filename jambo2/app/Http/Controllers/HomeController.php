<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Redirect to the appropriate dashboard based on the user's role
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard'); // Redirect to admin dashboard
        } elseif (Auth::guard('web')->check()) {
            return redirect()->route('dashboard'); // Redirect to regular user dashboard
        } elseif (Auth::guard('client')->check()) {
            return redirect()->route('client-dashboard'); // Redirect to client dashboard
        } else {
            return redirect()->route('login'); // Redirect to the default login page if not authenticated
        }
    }
}