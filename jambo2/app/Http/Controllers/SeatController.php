<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SeatController extends Controller
{
    
    /**
     * Show the list of seats.
     */
    public function index()
    {
        $seats = Seat::with('flight', 'booking')->latest()->get();
        return view('seats.index', compact('seats'));
    }

    /**
     * Show the form for creating a new seat.
     */
    public function create()
    {
        return view('seats.create');
    }

    /**
     * Store a newly created seat in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'seat_number' => 'required',
            'seat_class' => 'required',
            'availability_status' => 'required',
            'price' => 'required',
            'flight_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $seat = new Seat();
            $seat->seat_number = $request->seat_number;
            $seat->seat_class = $request->seat_class;
            $seat->availability_status = $request->availability_status;
            $seat->price = $request->price;
            $seat->flight_id = $request->flight_id;
            $seat->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('seats.create')->with('success', 'Seat created successfully');
    }

    /**
     * Display the specified seat.
     */
    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.show', compact('seat'));
    }

    /**
     * Show the form for editing the specified seat.
     */
    public function edit($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.edit', compact('seat'));
    }

    /**
     * Update the specified seat in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'seat_number' => 'required',
            'seat_class' => 'required',
            'availability_status' => 'required',
            'price' => 'required',
            'flight_id' => 'required',
        ]);

        $seat = Seat::findOrFail($id);

        DB::beginTransaction();
        try {
            $seat->seat_number = $request->seat_number;
            $seat->seat_class = $request->seat_class;
            $seat->availability_status = $request->availability_status;
            $seat->price = $request->price;
            $seat->flight_id = $request->flight_id;
            $seat->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('seats.edit', $id)->with('success', 'Seat updated successfully');
    }

    /**
     * Show the form for deleting the specified seat.
     */
    public function delete($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.delete', compact('seat'));
    }

    /**
     * Remove the specified seat from storage.
     */
    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);

        DB::beginTransaction();
        try {
            $seat->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('seats.index')->with('success', 'Seat deleted successfully');
    }

    /**
     * Filter seats based on various criteria.
     */
    public function filter(Request $request)
    {
        $seat_number = $request->seat_number;
        $seat_class = $request->seat_class;
        $availability_status = $request->availability_status;
        $price = $request->price;
        $flight_id = $request->flight_id;

        $seats = Seat::query();

        if ($seat_number) {
            $seats->where('seat_number', $seat_number);
        }

        if ($seat_class) {
            $seats->where('seat_class', $seat_class);
        }

        if ($availability_status) {
            $seats->where('availability_status', $availability_status);
        }

        if ($price) {
            $seats->where('price', $price);
        }

        if ($flight_id) {
            $seats->where('flight_id', $flight_id);
        }

        $seats = $seats->paginate();

        return view('seats.filter', compact('seats'));
    }
}