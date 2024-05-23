@extends('layouts.client')

@section('title', 'Create Booking')

@section('contents')
    <h1 class="mb-0">Add Booking</h1>
    <hr />
    <form action="{{ route('client.bookings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="client_id" class="form-control" placeholder="Client ID" value="{{ old('client_id') }}">
            </div>
            <div class="col">
                <input type="text" name="flight_id" class="form-control" placeholder="Flight ID" value="{{ old('flight_id') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" name="passenger_count" class="form-control" placeholder="Passenger Count" value="{{ old('passenger_count') }}">
            </div>
            <div class="col">
                <input type="text" name="seat_id" class="form-control" placeholder="Seat ID" value="{{ old('seat_id') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="total_price" class="form-control" placeholder="Total Price" value="{{ old('total_price') }}">
            </div>
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status" value="{{ old('status') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="payment_status" class="form-control" placeholder="Payment Status" value="{{ old('payment_status') }}">
            </div>
            <div class="col">
                <input type="date" name="booking_date" class="form-control" placeholder="Booking Date" value="{{ old('booking_date') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="booking_reference" class="form-control" placeholder="Booking Reference" value="{{ old('booking_reference') }}">
            </div>
            <div class="col">
                <textarea class="form-control" name="notes" placeholder="Notes">{{ old('notes') }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
