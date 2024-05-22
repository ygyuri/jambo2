<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airport;

class ClientAirportController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Fetch airports with relationships and counts, always paginated
            $airports = Airport::withCount('flights', 'arrivalFlights')->latest()->paginate(10); // Adjust the number as needed

            // Return view with airports
            return view('clientviews.airports-client.index', compact('airports'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching airports.']);
        }
    }

    public function show(string $id)
    {
        try {
            $airport = Airport::with('flights', 'arrivalFlights')->findOrFail($id);

            return view('clientviews.airports-client.show', compact('airport'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'Airport not found.']);
        }
    }
}