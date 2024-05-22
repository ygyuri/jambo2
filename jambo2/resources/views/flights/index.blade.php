@extends('layouts.app')

@section('title', 'Flights List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Flights</h1>
        <a href="{{ route('flights.create') }}" class="btn btn-primary">Add Flight</a>
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
                <th>Flight Number</th>
                <th>Departure Airport</th>
                <th>Arrival Airport</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Status</th>
                <th>Available Seats</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($flights->count() > 0)
                @foreach($flights as $flight)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $flight->flight_number }}</td>
                        <td class="align-middle">{{ $flight->departureAirport->name }}</td>
                        <td class="align-middle">{{ $flight->arrivalAirport->name }}</td>
                        <td class="align-middle">{{ $flight->formatted_departure_time }}</td>
                        <td class="align-middle">{{ $flight->formatted_arrival_time }}</td>
                        <td class="align-middle">{{ $flight->flight_duration }}</td>
                        <td class="align-middle">{{ $flight->price }}</td>
                        <td class="align-middle">{{ $flight->status }}</td>
                        <td class="align-middle">{{ $flight->available_seats }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('flights.show', $flight->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('flights.edit', $flight->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" type="button" class="p-0 btn btn-danger" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="m-0 btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="11">No flights found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
