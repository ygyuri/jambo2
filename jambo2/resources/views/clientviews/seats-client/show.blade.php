@extends('layouts.app')

@section('title', 'Seat Details')

@section('contents')
    <h1 class="mb-0">Seat Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Seat Number</label>
            <input type="text" class="form-control" value="{{ $seat->seat_number }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Seat Class</label>
            <input type="text" class="form-control" value="{{ $seat->seat_class }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Availability Status</label>
            <input type="text" class="form-control" value="{{ $seat->availability_status }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" value="{{ $seat->formatted_price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Flight</label>
            <input type="text" class="form-control" value="{{ $seat->flight->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Booking</label>
            <input type="text" class="form-control" value="{{ $seat->booking ? 'Booked' : 'Not Booked' }}" readonly>
        </div>
    </div>
@endsection
