@extends('layouts.client')

@section('title', 'Show Flight')

@section('contents')
    <h1 class="mb-0">Flight Details</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Flight Number</label>
            <input type="text" name="flight_number" class="form-control" value="{{ $flight->flight_number }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Departure Airport ID</label>
            <input type="number" name="departure_airport_id" class="form-control" value="{{ $flight->departure_airport_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Arrival Airport ID</label>
            <input type="number" name="arrival_airport_id" class="form-control" value="{{ $flight->arrival_airport_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Departure Time</label>
            <input type="text" name="departure_time" class="form-control" value="{{ $flight->formatted_departure_time }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Arrival Time</label>
            <input type="text" name="arrival_time" class="form-control" value="{{ $flight->formatted_arrival_time }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Duration</label>
            <input type="text" name="duration" class="form-control" value="{{ $flight->flight_duration }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Aircraft ID</label>
            <input type="number" name="aircraft_id" class="form-control" value="{{ $flight->aircraft_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $flight->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $flight->status }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Available Seats</label>
            <input type="number" name="available_seats" class="form-control" value="{{ $flight->available_seats }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" value="{{ $flight->created_at }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $flight->updated_at }}" readonly>
        </div>
    </div>
@endsection
