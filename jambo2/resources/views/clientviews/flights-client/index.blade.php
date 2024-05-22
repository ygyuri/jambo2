@extends('layouts.client')

@section('title', 'Flights List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Flights</h1>
    </div>
    <hr />
    @if($flights->count() > 0)
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
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $flight->flight_number }}</td>
                        <td>{{ $flight->departureAirport ? $flight->departureAirport->name : 'N/A' }}</td>
                        <td>{{ $flight->arrivalAirport ? $flight->arrivalAirport->name : 'N/A' }}</td>
                        <td>{{ $flight->formatted_departure_time }}</td>
                        <td>{{ $flight->formatted_arrival_time }}</td>
                        <td>{{ $flight->flight_duration }}</td>
                        <td>{{ $flight->price }}</td>
                        <td>{{ $flight->status }}</td>
                        <td>{{ $flight->available_seats }}</td>
                        <td>
                            <a href="{{ route('client.flights.show', $flight->id) }}" class="btn btn-secondary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No flights found.</p>
    @endif
@endsection
