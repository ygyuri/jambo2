@extends('layouts.client')

@section('title', 'Edit Booking')

@section('contents')
    <h1 class="mb-0">Edit Booking</h1>
    <hr />
    <form action="{{ route('client.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Passenger Count</label>
                <input type="text" name="passenger_count" class="form-control" value="{{ $booking->passenger_count }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Seat ID</label>
                <input type="text" name="seat_id" class="form-control" value="{{ $booking->seat_id }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Total Price</label>
                <input type="text" name="total_price" class="form-control" value="{{ $booking->total_price }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $booking->status }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Payment Status</label>
                <input type="text" name="payment_status" class="form-control" value="{{ $booking->payment_status }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Booking Date</label>
                <input type="text" name="booking_date" class="form-control" value="{{ $booking->booking_date }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Booking Reference</label>
                <input type="text" name="booking_reference" class="form-control" value="{{ $booking->booking_reference }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control">{{ $booking->notes }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
