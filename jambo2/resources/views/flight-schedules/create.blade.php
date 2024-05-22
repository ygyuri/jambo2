@extends('layouts.app')

@section('title', 'Create Flight Schedule')

@section('contents')
    <h1 class="mb-0">Add Flight Schedule</h1>
    <hr />
    <form action="{{ route('flight-schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <input type="number" name="flight_id" class="form-control" placeholder="Flight ID" required>
            </div>
            <div class="col">
                <input type="datetime-local" name="departure_time" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="datetime-local" name="arrival_time" class="form-control" required>
            </div>
            <div class="col">
                <select name="status" class="form-control" required>
                    <option value="scheduled">Scheduled</option>
                    <option value="delayed">Delayed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
