@extends('layouts.client')

@section('title', 'Client Bookings')

@section('content')
    <h1>Client Bookings</h1>
    <hr />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Flight ID</th>
                <th>Passenger Count</th>
                <th>Seat ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Booking Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->flight_id }}</td>
                    <td>{{ $booking->passenger_count }}</td>
                    <td>{{ $booking->seat_id }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->payment_status }}</td>
                    <td>{{ $booking->booking_date->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('client.bookings.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bookings->links() }}

@endsection
