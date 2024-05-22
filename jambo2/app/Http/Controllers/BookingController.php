<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class BookingController extends Controller
{
   

    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch bookings with relationships
        $bookings = Booking::with([
            'client',    // Relationship with client
            'flight',      // Relationship with flight
            'seat',        // Relationship with seat
        ])->latest()->get();

        // Return the view with bookings data
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a booking
        return view('bookings.create');
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'client_id' => 'required',
            'flight_id' => 'required',
            'passenger_count' => 'required',
            'seat_id' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'booking_date' => 'required|date',
            'booking_reference' => 'required',
            // Add any additional validation rules here
        ]);

        // Start database transaction
        DB::beginTransaction();
        try {
            // Create booking
            Booking::create($request->all());

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Redirect with success message
        return redirect()->route('bookings')->with('success', 'Booking created successfully');
    }

    /**
     * Display the specified booking.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        // Find booking by ID with relationships
        $booking = Booking::with([
            'client',    // Relationship with client
            'flight',      // Relationship with flight
            'seat',        // Relationship with seat
        ])->find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->route('bookings')->with('error', 'Booking not found');
        }

        // Return the view with booking details
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        // Find booking by ID
        $booking = Booking::find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->route('bookings')->with('error', 'Booking not found');
        }

        // Return the view for editing the booking
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // Validate request
        $request->validate([
            'client_id' => 'required',
            'flight_id' => 'required',
            'passenger_count' => 'required',
            'seat_id' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'booking_date' => 'required|date',
            'booking_reference' => 'required',
            // Add any additional validation rules here
        ]);

        // Find booking by ID
        $booking = Booking::find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->route('bookings')->with('error', 'Booking not found');
        }

        // Start database transaction
        DB::beginTransaction();
        try {
            // Update booking attributes
            $booking->update($request->all());

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Redirect with success message
        return redirect()->route('bookings')->with('success', 'Booking updated successfully');
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Find booking by ID
        $booking = Booking::find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->route('bookings')->with('error', 'Booking not found');
        }

        // Attempt to delete booking
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Delete the booking
            $booking->delete();

            // Commit transaction
            DB::commit();
        } catch (Exception $e) {
            // Rollback transaction on exception and return error response
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Redirect with success message
        return redirect()->route('bookings')->with('success', 'Booking deleted successfully');
    }


    /**
     * Filter bookings based on various criteria.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function bookingFilter(Request $request)
    {
        // Retrieve request parameters
        $client_id = $request->client_id;
        $flight_id = $request->flight_id;
        $passenger_count = $request->passenger_count;
        $seat_id = $request->seat_id;
        $total_price = $request->total_price;
        $status = $request->status;
        $payment_status = $request->payment_status;
        $booking_date = $request->booking_date;
        $booking_reference = $request->booking_reference;

        // Start building the query to retrieve bookings
        $bookings = Booking::query();

        // Apply filters based on request parameters
        if ($client_id) {
            $bookings->where('client_id', $client_id);
        }

        if ($flight_id) {
            $bookings->where('flight_id', $flight_id);
        }

        if ($passenger_count) {
            $bookings->where('passenger_count', $passenger_count);
        }

        if ($seat_id) {
            $bookings->where('seat_id', $seat_id);
        }

        if ($total_price) {
            $bookings->where('total_price', $total_price);
        }

        if ($status) {
            $bookings->where('status', $status);
        }

        if ($payment_status) {
            $bookings->where('payment_status', $payment_status);
        }

        if ($booking_date) {
            $bookings->whereDate('booking_date', Carbon::parse($booking_date)->toDateString());
        }

        if ($booking_reference) {
            $bookings->where('booking_reference', $booking_reference);
        }

        // Retrieve paginated results
        $bookings = $bookings->paginate();

        // Return the view with the paginated bookings
        return View::make('bookings.index')->with('bookings', $bookings);
    }

}