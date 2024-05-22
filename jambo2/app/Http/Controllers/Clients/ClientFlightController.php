<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ClientFlightController extends Controller
{
    public function index()
    {
        try {
            // Check if the user is authenticated
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['error' => 'You must be logged in to view this page.']);
            }

            // Retrieve flights associated with the authenticated client's bookings
            $clientBookings = Auth::user()->bookings;
            $flights = $clientBookings->map(function ($booking) {
                return $booking->flight;
            });

            return view('clientviews.flights-client.index', compact('flights'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching flights.']);
        }
    }

    public function show($id)
    {
        try {
            // Check if the user is authenticated
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['error' => 'You must be logged in to view this page.']);
            }

            // Retrieve the flight associated with the authenticated client's booking
            $clientBooking = Auth::user()->bookings()->findOrFail($id);
            $flight = $clientBooking->flight;

            return view('clientviews.flights-client.show', compact('flight'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'Flight not found.']);
        }
    }
}