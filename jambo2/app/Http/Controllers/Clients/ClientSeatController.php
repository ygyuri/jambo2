<?php

namespace App\Http\Controllers\Clients;

use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::orderBy('created_at', 'DESC')->get();

        return view('clientviews.seats-client.index', compact('seats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seat = Seat::findOrFail($id);

        return view('clientviews.seats-client.show', compact('seat'));
    }
}