<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use Illuminate\Support\Facades\DB;
use Exception;

class AirportController extends Controller
{
    


    /**
     * Display a listing of the airports.
     */
    public function index(Request $request)
    {
        // Fetch airports with relationships and counts, always paginated
        $airports = Airport::withCount('flights', 'arrivalFlights')->latest()->paginate(15); // Adjust the number as needed

        // Return view with airports
        return view('airports.index', compact('airports'));
    }

    /**
     * Show the form for creating a new airport.
     */
    public function create()
    {
        return view('airports.create');
    }

    /**
     * Store a newly created airport in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'timezone' => 'required',
            'elevation' => 'required',
        ]);

        // Start database transaction
        DB::beginTransaction();
        try {
            // Create airport with individual fields
            Airport::create($request->all());

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception
            DB::rollBack();
            return redirect()->route('airports.create')->with('error', $e->getMessage());
        }

        // Return success response
        return redirect()->route('airports.index')->with('success', 'Airport created successfully');
    }

    /**
     * Display the specified airport.
     */
    public function show(string $id)
    {
        $airport = Airport::with('flights', 'arrivalFlights')->findOrFail($id);

        return view('airports.show', compact('airport'));
    }

    /**
     * Show the form for editing the specified airport.
     */
    public function edit(string $id)
    {
        $airport = Airport::findOrFail($id);

        return view('airports.edit', compact('airport'));
    }

    /**
     * Update the specified airport in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'timezone' => 'required',
            'elevation' => 'required',
        ]);

        // Find airport by ID
        $airport = Airport::findOrFail($id);

        // Start database transaction
        DB::beginTransaction();
        try {
            // Update airport attributes
            $airport->update($request->all());

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception
            DB::rollBack();
            return redirect()->route('airports.edit', $id)->with('error', $e->getMessage());
        }

        // Return success response
        return redirect()->route('airports.index')->with('success', 'Airport updated successfully');
    }

    /**
     * Remove the specified airport from storage.
     */
    public function destroy(string $id)
    {
        $airport = Airport::findOrFail($id);

        // Attempt to delete airport
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Delete the airport
            $airport->delete();

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception
            DB::rollBack();
            return redirect()->route('airports.index')->with('error', $e->getMessage());
        }

        // Return success response
        return redirect()->route('airports.index')->with('success', 'Airport deleted successfully');
    }

    /**
     * Filter airports based on various criteria.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function filter(Request $request)
    {
        // Retrieve request parameters
        $city = $request->city;
        $country = $request->country;
        $timezone = $request->timezone;
        $elevation = $request->elevation;

        // Start building the query to retrieve airports
        $airports = Airport::query();

        // Apply filters based on request parameters
        if ($city) {
            $airports->where('city', $city);
        }

        if ($country) {
            $airports->where('country', $country);
        }

        if ($timezone) {
            $airports->where('timezone', $timezone);
        }

        if ($elevation) {
            $airports->where('elevation', $elevation);
        }

        // Retrieve paginated results
        $airports = $airports->paginate();

        // Return view with filtered airports
        return view('airports.index', compact('airports'));
    }
}