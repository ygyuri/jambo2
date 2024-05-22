@extends('layouts.app')

@section('title', 'Edit Booking')

@section('contents')
    <h1 class="mb-0">Edit Booking</h1>
    <hr />
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col">
                <label for="client_id" class="form-label">Client ID</label>
                <input type="text" name="client_id" class="form-control" value="{{ $booking->client_id }}">
            </div>
            <div class="col">
                <label for="flight_id" class="form-label">Flight ID</label>
                <input type="text" name="flight_id" class="form-control" value="{{ $booking->flight_id }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="passenger_count" class="form-label">Passenger Count</label>
                <input type="text" name="passenger_count" class="form-control" value="{{ $booking->passenger_count }}">
            </div>
            <div class="col">
                <label for="seat_id" class="form-label">Seat ID</label>
                <input type="text" name="seat_id" class="form-control" value="{{ $booking->seat_id }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="text" name="total_price" class="form-control" value="{{ $booking->total_price }}">
            </div>
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $booking->status }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="payment_status" class="form-label">Payment Status</label>
                <input type="text" name="payment_status" class="form-control" value="{{ $booking->payment_status }}">
            </div>
            <div class="col">
                <label for="booking_date" class="form-label">Booking Date</label>
                <input type="date" name="booking_date" class="form-control" value="{{ $booking->booking_date->format('Y-m-d') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="booking_reference" class="form-label">Booking Reference</label>
                <input type="text" name="booking_reference" class="form-control" value="{{ $booking->booking_reference }}">
            </div>
            <div class="col">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" name="notes">{{ $booking->notes }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
