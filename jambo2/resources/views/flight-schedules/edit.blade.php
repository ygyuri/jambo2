@extends('layouts.app')

@section('title', 'Edit Flight Schedule')

@section('contents')
    <h1 class="mb-0">Edit Flight Schedule</h1>
    <hr />
    <form action="{{ route('flight-schedules.update', $flightSchedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col">
                <label for="flight_id" class="form-label">Flight ID</label>
                <input type="text" name="flight_id" class="form-control" value="{{ $flightSchedule->flight_id }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="departure_time" class="form-label">Departure Time</label>
                <input type="datetime-local" name="departure_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($flightSchedule->departure_time)) }}">
            </div>
            <div class="col">
                <label for="arrival_time" class="form-label">Arrival Time</label>
                <input type="datetime-local" name="arrival_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($flightSchedule->arrival_time)) }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="scheduled" {{ $flightSchedule->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="delayed" {{ $flightSchedule->status == 'delayed' ? 'selected' : '' }}>Delayed</option>
                    <option value="canceled" {{ $flightSchedule->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
