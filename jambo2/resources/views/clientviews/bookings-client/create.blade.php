@extends('layouts.client')

@section('title', 'Create Booking')

@section('contents')
    <h1 class="mb-0">Add Booking</h1>
    <hr />
    <form action="{{ route('client.bookings.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <select name="client_id" class="form-control">
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select name="flight_id" class="form-control">
                    <option value="">Select Flight</option>
                    @foreach($flights as $flight)
                        <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" name="passenger_count" class="form-control" placeholder="Passenger Count">
            </div>
            <div class="col">
                <input type="number" name="seat_id" class="form-control" placeholder="Seat ID">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="total_price" class="form-control" placeholder="Total Price">
            </div>
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="payment_status" class="form-control" placeholder="Payment Status">
            </div>
            <div class="col">
                <input type="date" name="booking_date" class="form-control" placeholder="Booking Date">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="booking_reference" class="form-control" placeholder="Booking Reference">
            </div>
            <div class="col">
                <textarea class="form-control" name="notes" placeholder="Notes"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
