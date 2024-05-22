
@extends('layouts.app')

@section('title', 'Home Seat')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Seats</h1>
        <a href="{{ route('seats.create') }}" class="btn btn-primary">Add Seat</a>
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
                <th>Seat Number</th>
                <th>Class</th>
                <th>Status</th>
                <th>Price</th>
                <th>Flight ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($seats->count() > 0)
                @foreach($seats as $seat)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $seat->seat_number }}</td>
                        <td class="align-middle">{{ $seat->seat_class }}</td>
                        <td class="align-middle">{{ $seat->availability_status }}</td>
                        <td class="align-middle">{{ $seat->formatted_price }}</td>
                        <td class="align-middle">{{ $seat->flight_id }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('seats.show', $seat->id) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('seats.edit', $seat->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('seats.destroy', $seat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="7">No seats found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
