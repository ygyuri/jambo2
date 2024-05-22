<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class ClientBookingController extends Controller
{
    public function index()
    {
        try {
            $bookings = Booking::where('client_id', Auth::user()->id)->paginate(10);
            return view('clientviews.bookings-client.index', compact('bookings'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching bookings.']);
        }
    }

    public function create()
    {
        return view('clientviews.bookings-client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => ['required', 'integer'],
            'flight_id' => 'required|integer',
            'passenger_count' => 'required|integer',
            'seat_id' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'payment_status' => 'required|string',
            'booking_date' => 'required|date',
            'booking_reference' => 'required|string|unique:bookings,booking_reference',
        ]);

        DB::beginTransaction();
        try {
            $booking = Booking::create([
                'client_id' => Auth::user()->id,
                'flight_id' => $request->flight_id,
                'passenger_count' => $request->passenger_count,
                'seat_id' => $request->seat_id,
                'total_price' => $request->total_price,
                'status' => $request->status,
                'payment_status' => $request->payment_status,
                'booking_date' => $request->booking_date,
                'booking_reference' => $request->booking_reference,
            ]);

            DB::commit();

            return redirect()->route('client.bookings.index')->with('success', 'Booking created successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            return view('clientviews.bookings-client.show', compact('booking'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Booking not found.']);
        }
    }

    public function edit($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            return view('clientviews.bookings-client.edit', compact('booking'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Booking not found.']);
        }
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
            return redirect()->route('client.bookings.index')->with('success', 'Booking deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the booking.']);
        }
    }
}