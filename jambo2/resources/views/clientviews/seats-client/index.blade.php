@extends('layouts.client')

@section('title', 'Seat List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Seats</h1>
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
                <th>Seat Class</th>
                <th>Availability Status</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($seats as $seat)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $seat->seat_number }}</td>
                    <td class="align-middle">{{ $seat->seat_class }}</td>
                    <td class="align-middle">{{ $seat->availability_status }}</td>
                    <td class="align-middle">{{ $seat->formatted_price }}</td> <!-- Using accessor -->
                    <td class="align-middle">
                        <a href="{{ route('client.seats.show', $seat->id) }}" class="btn btn-secondary">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No seats found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
