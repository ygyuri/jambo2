@extends('layouts.app')

@section('title', 'Flight Schedules')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Flight Schedules</h1>
        <a href="{{ route('flight-schedules.create') }}" class="btn btn-primary">Add Flight Schedule</a>
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
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('flight-schedules.show', $fs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('flight-schedules.edit', $fs->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('flight-schedules.destroy', $fs->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
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
