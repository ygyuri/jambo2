@extends('layouts.client')

@section('title', 'Flight Listings')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Flight Listings</h1>
        <a href="{{ route('client.flights.create') }}" class="btn btn-primary">Add Flight</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Flight Number</th>
                    <th>Departure Airport</th>
                    <th>Departure Time</th>
                    <th>Arrival Airport</th>
                    <th>Arrival Time</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $flight->flight_number }}</td>
                        <td>{{ $flight->departureAirport->name }}</td>
                        <td>{{ $flight->formatted_departure_time }}</td>
                        <td>{{ $flight->arrivalAirport->name }}</td>
                        <td>{{ $flight->formatted_arrival_time }}</td>
                        <td>{{ $flight->flightDuration }}</td>
                        <td>{{ $flight->price }}</td>
                        <td>{{ $flight->status }}</td>
                        <td>
                            <a href="{{ route('client.flights.show', $flight->id) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('client.flights.edit', $flight->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
