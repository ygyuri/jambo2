<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seat;
use Illuminate\Support\Facades\Auth;

class ClientSeatController extends Controller
{
    public function index()
    {
        try {
            $seats = Seat::whereHas('flight', function ($query) {
                $query->where('client_id', Auth::user()->id);
            })->paginate(10);
            return view('clientviews.seats-client.index', compact('seats'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'An error occurred while fetching seats.']);
        }
    }

    public function show($id)
    {
        try {
            $seat = Seat::whereHas('flight', function ($query) {
                $query->where('client_id', Auth::user()->id);
            })->findOrFail($id);

            return view('clientviews.seats-client.show', compact('seat'));
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'Seat not found.']);
        }
    }
}