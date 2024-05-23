<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClientBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();

        return view('clientviews.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientviews.bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Define your validation rules here
        ]);

        try {
            DB::beginTransaction();

            $booking = Booking::create($validatedData);

            DB::commit();

            return redirect()->route('client.bookings.index')->with('success', 'Booking added successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->withErrors(['error' => 'An error occurred while adding the booking. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('clientviews.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('clientviews.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // Define your validation rules here
        ]);

        try {
            DB::beginTransaction();

            $booking = Booking::findOrFail($id);
            $booking->update($validatedData);

            DB::commit();

            return redirect()->route('client.bookings.index')->with('success', 'Booking updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the booking. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $booking = Booking::findOrFail($id);
            $booking->delete();

            DB::commit();

            return redirect()->route('client.bookings.index')->with('success', 'Booking deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'An error occurred while deleting the booking. Please try again.']);
        }
    }
}