@extends('layouts.app')

@section('title', 'Show Booking')

@section('contents')
    <h1 class="mb-0">Booking Details</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Client ID</label>
            <input type="text" name="client_id" class="form-control" value="{{ $booking->client_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Flight ID</label>
            <input type="text" name="flight_id" class="form-control" value="{{ $booking->flight_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Passenger Count</label>
            <input type="text" name="passenger_count" class="form-control" value="{{ $booking->passenger_count }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Seat ID</label>
            <input type="text" name="seat_id" class="form-control" value="{{ $booking->seat_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Total Price</label>
            <input type="text" name="total_price" class="form-control" value="{{ $booking->total_price }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $booking->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Payment Status</label>
            <input type="text" name="payment_status" class="form-control" value="{{ $booking->payment_status }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Booking Date</label>
            <input type="text" name="booking_date" class="form-control" value="{{ $booking->booking_date->format('Y-m-d') }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Booking Reference</label>
            <input type="text" name="booking_reference" class="form-control" value="{{ $booking->booking_reference }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" readonly>{{ $booking->notes }}</textarea>
        </div>
    </div>
    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
