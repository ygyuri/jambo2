@extends('layouts.app')

@section('title', 'Airports')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Airport List</h1>
        <a href="{{ route('airports.create') }}" class="btn btn-primary">Add Airport</a>
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('airports.show', $airport->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('airports.edit', $airport->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('airports.destroy', $airport->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
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
