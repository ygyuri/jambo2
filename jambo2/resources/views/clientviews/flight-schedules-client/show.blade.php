@extends('layouts.client')

@section('title', 'Flight Schedule Details')

@section('contents')
    <h1 class="mb-0">Flight Schedule Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Flight ID</label>
            <input type="text" class="form-control" value="{{ $flightSchedule->flight_id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Departure Time</label>
            <input type="text" class="form-control" value="{{ $flightSchedule->departure_time }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Arrival Time</label>
            <input type="text" class="form-control" value="{{ $flightSchedule->arrival_time }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ $flightSchedule->status }}" readonly>
        </div>
    </div>
@endsection
