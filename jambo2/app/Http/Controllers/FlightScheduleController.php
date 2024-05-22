<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\FlightSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class FlightScheduleController extends Controller
{

   

    /**
     * Display a listing of the flight schedules.
     */
    public function index()
    {
        $flightSchedules = FlightSchedule::orderBy('created_at', 'DESC')->get();
        return view('flight-schedules.index', compact('flightSchedules'));
    }

    /**
     * Show the form for creating a new flight schedule.
     */
    public function create()
    {
        return view('flight-schedules.create');
    }

    /**
     * Store a newly created flight schedule in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'status' => ['required', Rule::in(['scheduled', 'delayed', 'canceled'])],
        ]);

        DB::beginTransaction();
        try {
            FlightSchedule::create([
                'flight_id' => $request->flight_id,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
                'status' => $request->status,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('flight-schedules.index')->with('success', 'Flight schedule added successfully');
    }

    /**
     * Display the specified flight schedule.
     */
    public function show($id)
    {
        $flightSchedule = FlightSchedule::findOrFail($id);
        return view('flight-schedules.show', compact('flightSchedule'));
    }

    /**
     * Show the form for editing the specified flight schedule.
     */
    public function edit($id)
    {
        $flightSchedule = FlightSchedule::findOrFail($id);
        return view('flight-schedules.edit', compact('flightSchedule'));
    }

    /**
     * Update the specified flight schedule in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_id' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'status' => ['required', Rule::in(['scheduled', 'delayed', 'canceled'])],
        ]);

        $flightSchedule = FlightSchedule::findOrFail($id);

        DB::beginTransaction();
        try {
            $flightSchedule->update([
                'flight_id' => $request->flight_id,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
                'status' => $request->status,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('flight-schedules.index')->with('success', 'Flight schedule updated successfully');
    }

    /**
     * Remove the specified flight schedule from storage.
     */
    public function destroy($id)
    {
        $flightSchedule = FlightSchedule::findOrFail($id);
        $flightSchedule->delete();
        return redirect()->route('flight-schedules.index')->with('success', 'Flight schedule deleted successfully');
    }

    /**
     * Filter flight schedules based on various criteria.
     */
    public function filter(Request $request)
    {
        $flightSchedules = FlightSchedule::query();

        if ($request->flight_id) {
            $flightSchedules->where('flight_id', $request->flight_id);
        }

        if ($request->departure_time) {
            $flightSchedules->where('departure_time', $request->departure_time);
        }

        if ($request->arrival_time) {
            $flightSchedules->where('arrival_time', $request->arrival_time);
        }

        if ($request->status) {
            $flightSchedules->where('status', $request->status);
        }

        $flightSchedules = $flightSchedules->paginate();

        return view('flight-schedules.index', compact('flightSchedules'));
    }
}