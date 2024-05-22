

@extends('layouts.client')

@section('title', 'Client Payments')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Client Payments</h1>
        <a href="{{ route('client.payments.create') }}" class="btn btn-primary">Add Payment</a>
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
                <th>Booking ID</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Transaction ID</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->booking_id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ $payment->transaction_id }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('client.payments.show', $payment->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('client.payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('client.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
