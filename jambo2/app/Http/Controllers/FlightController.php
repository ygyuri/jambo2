<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class FlightController extends Controller
{
    
    /**
     * Display a listing of the flights.
     */
    public function index()
    {
        $flights = Flight::latest()->get();
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new flight.
     */
    public function create()
    {
        return view('flights.create');
    }

    /**
     * Store a newly created flight in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required',
            'departure_airport_id' => 'required',
            'arrival_airport_id' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'duration' => 'required',
            'aircraft_id' => 'required',
            'price' => 'required',
            'status' => 'required',
            'available_seats' => 'required',
            // Add any additional validation rules here
        ]);

        DB::beginTransaction();
        try {
            Flight::create([
                'flight_number' => $request->flight_number,
                'departure_airport_id' => $request->departure_airport_id,
                'arrival_airport_id' => $request->arrival_airport_id,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
                'duration' => $request->duration,
                'aircraft_id' => $request->aircraft_id,
                'price' => $request->price,
                'status' => $request->status,
                'available_seats' => $request->available_seats,
            ]);
            DB::commit();
            return redirect()->route('flights.index')->with('success', 'Flight added successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified flight.
     */
    public function show(string $id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified flight.
     */
    public function edit(string $id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    /**
     * Update the specified flight in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'flight_number' => 'required',
            'departure_airport_id' => 'required',
            'arrival_airport_id' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'duration' => 'required',
            'aircraft_id' => 'required',
            'price' => 'required',
            'status' => 'required',
            'available_seats' => 'required',
            // Add any additional validation rules here
        ]);

        DB::beginTransaction();
        try {
            $flight = Flight::findOrFail($id);
            $flight->update([
                'flight_number' => $request->flight_number,
                'departure_airport_id' => $request->departure_airport_id,
                'arrival_airport_id' => $request->arrival_airport_id,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
                'duration' => $request->duration,
                'aircraft_id' => $request->aircraft_id,
                'price' => $request->price,
                'status' => $request->status,
                'available_seats' => $request->available_seats,
            ]);
            DB::commit();
            return redirect()->route('flights.index')->with('success', 'Flight updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified flight from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $flight = Flight::findOrFail($id);
            $flight->delete();
            DB::commit();
            return redirect()->route('flights.index')->with('success', 'Flight deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }


    public function flightFilter(Request $request)
    {
        // Retrieve request parameters
        $departure_airport_id = $request->departure_airport_id;
        $arrival_airport_id = $request->arrival_airport_id;
        $departure_time = $request->departure_time;
        $arrival_time = $request->arrival_time;
        $duration = $request->duration;
        $aircraft_id = $request->aircraft_id;
        $status = $request->status;
        $price = $request->price;
        $available_seats = $request->available_seats;
        $created_date = $request->created_date;

        // Start building the query to retrieve flights
        $flights = Flight::query();

        // Apply filters based on request parameters
        if ($departure_airport_id) {
            $flights->where('departure_airport_id', $departure_airport_id);
        }

        if ($arrival_airport_id) {
            $flights->where('arrival_airport_id', $arrival_airport_id);
        }

        if ($departure_time) {
            $flights->whereDate('departure_time', Carbon::parse($departure_time)->toDateString());
        }

        if ($arrival_time) {
            $flights->whereDate('arrival_time', Carbon::parse($arrival_time)->toDateString());
        }

        if ($duration) {
            // Duration could be a range, but for simplicity, let's assume it's an exact match
            $flights->where('duration', $duration);
        }

        if ($aircraft_id) {
            $flights->where('aircraft_id', $aircraft_id);
        }

        if ($status) {
            $flights->where('status', $status);
        }

        if ($price) {
            $flights->where('price', $price);
        }

        if ($available_seats) {
            $flights->where('available_seats', $available_seats);
        }

        if ($created_date && $created_date != 'all') {
            // Apply date filters based on the selected option
            // You can extend this part for more date filtering options
            switch ($created_date) {
                case 'today':
                    $flights->whereDate('created_at', Carbon::today());
                    break;
                case 'yesterday':
                    $flights->whereDate('created_at', Carbon::yesterday());
                    break;
                // Add more cases as needed
                default:
                    // Handle custom date ranges if needed
                    break;
            }
        }

        // Retrieve paginated results
        $flights = $flights->paginate();

        // Load the view with filtered flights
        return view('flights.index', compact('flights'));
    }

}
