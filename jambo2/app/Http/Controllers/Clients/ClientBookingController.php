<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Models\Airport;


class ClientBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();

        return view('clientviews.bookings-client.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientviews.bookings-client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required',
            'flight_id' => 'required',
            'passenger_count' => 'required|numeric',
            'seat_id' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'booking_date' => 'required|date',
            'booking_reference' => 'required',
            'notes' => 'nullable',
        ]);

        try {
            $booking = Booking::create($validatedData);
            return redirect()->route('client.bookings.index')->with('success', 'Booking added successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while adding the booking. Please try again.']);
        }
    }


  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('clientviews.bookings-client.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('clientviews.bookings-client.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'passenger_count' => 'required|numeric',
            'seat_id' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'booking_date' => 'required|date',
            'booking_reference' => 'required',
            'notes' => 'nullable',
        ]);

        try {
            $booking = Booking::findOrFail($id);
            $booking->update($validatedData);
            return redirect()->route('client.bookings.index')->with('success', 'Booking updated successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the booking. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
            return redirect()->route('client.bookings.index')->with('success', 'Booking deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while deleting the booking. Please try again.']);
        }
    }


    public function getBookingsAndAirports()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();
        $airports = Airport::all();

        return response()->json(compact('bookings', 'airports'));
    }

}