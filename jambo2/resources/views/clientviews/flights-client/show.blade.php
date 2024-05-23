@extends('layouts.client')

@section('title', 'Flight Details')

@section('contents')
    <h1 class="mb-0">Flight Details</h1>
    <hr />
    <div>
        <p><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
        <p><strong>Departure Airport:</strong> {{ $flight->departureAirport->name }}</p>
        <p><strong>Departure Time:</strong> {{ $flight->formatted_departure_time }}</p>
        <p><strong>Arrival Airport:</strong> {{ $flight->arrivalAirport->name }}</p>
        <p><strong>Arrival Time:</strong> {{ $flight->formatted_arrival_time }}</p>
        <p><strong>Duration:</strong> {{ $flight->flightDuration }}</p>
        <p><strong>Price:</strong> {{ $flight->price }}</p>
        <p><strong>Status:</strong> {{ $flight->status }}</p>
    </div>
    <a href="{{ route('client.flights.index') }}" class="btn btn-primary">Back to Listings</a>
@endsection
