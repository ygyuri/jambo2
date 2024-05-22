<!-- resources/views/flights/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Flight')

@section('contents')
    <h1 class="mb-0">Edit Flight</h1>
    <hr />
    <form action="{{ route('flights.update', $flight->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Flight Number</label>
                <input type="text" name="flight_number" class="form-control" value="{{ $flight->flight_number }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Departure Airport ID</label>
                <input type="number" name="departure_airport_id" class="form-control" value="{{ $flight->departure_airport_id }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Arrival Airport ID</label>
                <input type="number" name="arrival_airport_id" class="form-control" value="{{ $flight->arrival_airport_id }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Departure Time</label>
                <input type="datetime-local" name="departure_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($flight->departure_time)) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Arrival Time</label>
                <input type="datetime-local" name="arrival_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($flight->arrival_time)) }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ $flight->duration }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Aircraft ID</label>
                <input type="number" name="aircraft_id" class="form-control" value="{{ $flight->aircraft_id }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $flight->price }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $flight->status }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Available Seats</label>
                <input type="number" name="available_seats" class="form-control" value="{{ $flight->available_seats }}" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
