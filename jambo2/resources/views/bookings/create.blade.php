@extends('layouts.app')

@section('title', 'Create Booking')

@section('contents')
    <h1 class="mb-0">Add Booking</h1>
    <hr />
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <label for="client_id" class="form-label">Client ID</label>
                <input type="text" name="client_id" class="form-control" placeholder="Client ID">
            </div>
            <div class="col">
                <label for="flight_id" class="form-label">Flight ID</label>
                <input type="text" name="flight_id" class="form-control" placeholder="Flight ID">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="passenger_count" class="form-label">Passenger Count</label>
                <input type="text" name="passenger_count" class="form-control" placeholder="Passenger Count">
            </div>
            <div class="col">
                <label for="seat_id" class="form-label">Seat ID</label>
                <input type="text" name="seat_id" class="form-control" placeholder="Seat ID">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="text" name="total_price" class="form-control" placeholder="Total Price">
            </div>
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="payment_status" class="form-label">Payment Status</label>
                <input type="text" name="payment_status" class="form-control" placeholder="Payment Status">
            </div>
            <div class="col">
                <label for="booking_date" class="form-label">Booking Date</label>
                <input type="date" name="booking_date" class="form-control" placeholder="Booking Date">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="booking_reference" class="form-label">Booking Reference</label>
                <input type="text" name="booking_reference" class="form-control" placeholder="Booking Reference">
            </div>
            <div class="col">
                <label for="notes" class="form-label">Notes</label>
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
