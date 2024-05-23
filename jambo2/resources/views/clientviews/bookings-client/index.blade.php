@extends('layouts.client')

@section('title', 'Client Bookings')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Bookings</h1>
        <a href="{{ route('client.bookings.create') }}" class="btn btn-primary">Add Booking</a>
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
                <th>Client ID</th>
                <th>Flight ID</th>
                <th>Passenger Count</th>
                <th>Seat ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Booking Date</th>
                <th>Booking Reference</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($bookings->count() > 0)
                @foreach($bookings as $booking)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $booking->client_id }}</td>
                        <td class="align-middle">{{ $booking->flight_id }}</td>
                        <td class="align-middle">{{ $booking->passenger_count }}</td>
                        <td class="align-middle">{{ $booking->seat_id }}</td>
                        <td class="align-middle">{{ $booking->total_price }}</td>
                        <td class="align-middle">{{ $booking->status }}</td>
                        <td class="align-middle">{{ $booking->payment_status }}</td>
                        <td class="align-middle">{{ $booking->booking_date }}</td>
                        <td class="align-middle">{{ $booking->booking_reference }}</td>
                        <td class="align-middle">{{ $booking->notes }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('client.bookings.show', $booking->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('client.bookings.edit', $booking->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('client.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Delete?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="12">No bookings found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
