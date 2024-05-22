@extends('layouts.app')

@section('title', 'Payments')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Payments</h1>
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
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
            @if($payments->count() > 0)
                @foreach($payments as $payment)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $payment->booking_id }}</td>
                        <td class="align-middle">{{ $payment->amount }}</td>
                        <td class="align-middle">{{ $payment->payment_method }}</td>
                        <td class="align-middle">{{ $payment->status }}</td>
                        <td class="align-middle">{{ $payment->transaction_id }}</td>
                        <td class="align-middle">{{ $payment->payment_date->format('Y-m-d') }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('payments.show', $payment->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('payments.edit', $payment->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" type="button" class="p-0 btn btn-danger" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="8">Payments not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
