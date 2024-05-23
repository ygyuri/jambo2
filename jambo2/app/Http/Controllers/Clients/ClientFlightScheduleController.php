<?php

namespace App\Http\Controllers\Clients;

use App\Models\FlightSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientFlightScheduleController extends Controller
{
    /**
     * Display a listing of the flight schedules.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $flightSchedules = FlightSchedule::orderBy('departure_time', 'ASC')->get();

        return view('clientviews.flight-schedules-client.index', compact('flightSchedules'));
    }

    /**
     * Display the specified flight schedule.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $flightSchedule = FlightSchedule::findOrFail($id);

        return view('flight_schedules.show', compact('flightSchedule'));
    }
}