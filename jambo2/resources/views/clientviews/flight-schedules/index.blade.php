@extends('layouts.client')

@section('title', 'Flight Schedules')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Flight Schedules</h1>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Flight ID</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($flightSchedules->count() > 0)
                @foreach($flightSchedules as $fs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $fs->flight_id }}</td>
                        <td class="align-middle">{{ $fs->departure_time }}</td>
                        <td class="align-middle">{{ $fs->arrival_time }}</td>
                        <td class="align-middle">{{ $fs->status }}</td>
                        <td class="align-middle">
                            <a href="{{ route('flight-schedules.show', $fs->id) }}" class="btn btn-secondary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Flight Schedule not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
