<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aircraft;

class AircraftController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        // Retrieve paginated aircrafts ordered by creation date
        $aircrafts = Aircraft::orderBy('created_at', 'DESC')->paginate(15); // Adjust the number as needed

        // Return view with the paginated aircrafts data
        return view('aircrafts.index', compact('aircrafts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new aircraft
        return view('aircrafts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request fields
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'registration_number' => 'required|unique:aircrafts',
            'sitting_capacity' => 'required|integer|min:1',
        ]);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Create new aircraft record
            Aircraft::create([
                'name' => $request->name,
                'manufacturer' => $request->manufacturer,
                'registration_number' => $request->registration_number,
                'sitting_capacity' => $request->sitting_capacity,
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('aircrafts.index')->with('success', 'Aircraft created successfully');
        } catch (Exception $e) {
            // Rollback transaction if an exception occurs
            DB::rollBack();

            // Redirect with error message
            return redirect()->route('aircrafts.create')->with('error', 'Failed to create aircraft: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the aircraft by ID or fail
        $aircraft = Aircraft::findOrFail($id);

        // Return the view with the aircraft data
        return view('aircrafts.show', compact('aircraft'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the aircraft by ID or fail
        $aircraft = Aircraft::findOrFail($id);

        // Return the view with the aircraft data
        return view('aircrafts.edit', compact('aircraft'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request fields
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'registration_number' => 'required|unique:aircrafts,registration_number,' . $id,
            'sitting_capacity' => 'required|integer|min:1',
        ]);

        // Find the aircraft by ID or fail
        $aircraft = Aircraft::findOrFail($id);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Update aircraft data
            $aircraft->update([
                'name' => $request->name,
                'manufacturer' => $request->manufacturer,
                'registration_number' => $request->registration_number,
                'sitting_capacity' => $request->sitting_capacity,
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('aircrafts.index')->with('success', 'Aircraft updated successfully');
        } catch (Exception $e) {
            // Rollback transaction if an exception occurs
            DB::rollBack();

            // Redirect with error message
            return redirect()->route('aircrafts.edit', $id)->with('error', 'Failed to update aircraft: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the aircraft by ID or fail
        $aircraft = Aircraft::findOrFail($id);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Delete the aircraft
            $aircraft->delete();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('aircrafts.index')->with('success', 'Aircraft deleted successfully');
        } catch (Exception $e) {
            // Rollback transaction if an exception occurs
            DB::rollBack();

            // Redirect with error message
            return redirect()->route('aircrafts.index')->with('error', 'Failed to delete aircraft: ' . $e->getMessage());
        }
    }

    /**
     * Filter aircraft based on specified criteria.
     */
    public function filter(Request $request)
    {
        // Retrieve filters from request
        $name = $request->name;
        $manufacturer = $request->manufacturer;
        $registration_number = $request->registration_number;
        $sitting_capacity = $request->sitting_capacity;

        // Query aircraft with eager loaded relationships and counts
        $aircrafts = Aircraft::with('flights')->withCount('flights')->latest();

        // Applying filters
        if ($name) {
            $aircrafts->where('name', 'like', '%' . $name . '%');
        }

        if ($manufacturer) {
            $aircrafts->where('manufacturer', 'like', '%' . $manufacturer . '%');
        }

        if ($registration_number) {
            $aircrafts->where('registration_number', 'like', '%' . $registration_number . '%');
        }

        if ($sitting_capacity) {
            $aircrafts->where('sitting_capacity', $sitting_capacity);
        }

        $aircrafts = $aircrafts->paginate();

        // Return the view with the filtered aircrafts data
        return view('aircrafts.index', compact('aircrafts'));
    }
}
