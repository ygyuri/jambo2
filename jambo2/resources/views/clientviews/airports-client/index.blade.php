@extends('layouts.client')

@section('title', 'Airports')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Airport List</h1>
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
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Flights (Departures)</th>
                <th>Flights (Arrivals)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($airports as $airport)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $airport->name }}</td>
                    <td>{{ $airport->city }}</td>
                    <td>{{ $airport->country }}</td>
                    <td>{{ $airport->flights_count }}</td>
                    <td>{{ $airport->arrival_flights_count }}</td>
                    <td>
                        <a href="{{ route('client.airports.show', $airport->id) }}" class="btn btn-secondary">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">No airports found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $airports->links() }} <!-- Pagination links -->
@endsection
