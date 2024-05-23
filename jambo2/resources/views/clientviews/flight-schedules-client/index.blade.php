@extends('layouts.client')

@section('title', 'Flight Schedules')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Flight Schedules</h1>
    </div>
    <hr />
    @if ($flightSchedules->count() > 0)
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Flight ID</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flightSchedules as $flightSchedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $flightSchedule->flight_id }}</td>
                        <td>{{ $flightSchedule->departure_time }}</td>
                        <td>{{ $flightSchedule->arrival_time }}</td>
                        <td>{{ $flightSchedule->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No flight schedules found.</p>
    @endif
@endsection
