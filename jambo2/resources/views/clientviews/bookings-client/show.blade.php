@extends('layouts.client')

@section('title', 'Booking Details')

@section('contents')
    <h1 class="mb-0">Booking Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Client</label>
            <input type="text" class="form-control" value="{{ $booking->client->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Flight</label>
            <input type="text" class="form-control" value="{{ $booking->flight->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Passenger Count</label>
            <input type="text" class="form-control" value="{{ $booking->passenger_count }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Seat ID</label>
            <input type="text" class="form-control" value="{{ $booking->seat_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Price</label>
            <input type="text" class="form-control" value="{{ $booking->total_price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ $booking->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Payment Status</label>
            <input type="text" class="form-control" value="{{ $booking->payment_status }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Booking Date</label>
            <input type="text" class="form-control" value="{{ $booking->booking_date }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Booking Reference</label>
            <input type="text" class="form-control" value="{{ $booking->booking_reference }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" readonly>{{ $booking->notes }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value="{{ $booking->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" class="form-control" value="{{ $booking->updated_at }}" readonly>
        </div>
    </div>
@endsection
