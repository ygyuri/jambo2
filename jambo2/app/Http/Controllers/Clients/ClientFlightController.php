<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Http\Controllers\Controller;

class ClientFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::orderBy('departure_time', 'ASC')->get();

        return view('clientviews.flights-client.index', compact('flights'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::findOrFail($id);

        return view('clientviews.flights-client.show', compact('flight'));
    }
}