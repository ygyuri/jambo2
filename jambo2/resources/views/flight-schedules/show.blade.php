@extends('layouts.app')

@section('title', 'Show Flight Schedule')

@section('contents')
    <h1 class="mb-0">Detail Flight Schedule</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Flight ID</label>
            <input type="text" name="flight_id" class="form-control" value="{{ $flightSchedule->flight_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Departure Time</label>
            <input type="text" name="departure_time" class="form-control" value="{{ $flightSchedule->departure_time }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Arrival Time</label>
            <input type="text" name="arrival_time" class="form-control" value="{{ $flightSchedule->arrival_time }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $flightSchedule->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" value="{{ $flightSchedule->created_at }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $flightSchedule->updated_at }}" readonly>
        </div>
    </div>
@endsection
