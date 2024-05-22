<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlightSchedule;
use Illuminate\Support\Facades\Auth;

class ClientFlightScheduleController extends Controller
{
    public function index()
    {
        try {
            $flightSchedules = FlightSchedule::whereHas('flight', function ($query) {
                $query->where('client_id', Auth::user()->id);
            })->paginate(10);
            return view('clientviews.flight-schedules-client.index', compact('flightSchedules'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching flight schedules.']);
        }
    }

    public function show($id)
    {
        try {
            $flightSchedule = FlightSchedule::whereHas('flight', function ($query) {
                $query->where('client_id', Auth::user()->id);
            })->findOrFail($id);
            return view('clientviews.flight-schedules-client.show', compact('flightSchedule'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'Flight schedule not found.']);
        }
    }
}