
@extends('layouts.client')

@section('title', 'Create Payment')

@section('contents')
    <h1 class="mb-0">Add Payment</h1>
    <hr />
    <form action="{{ route('client.payments.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="booking_id" class="form-control" placeholder="Booking ID">
            </div>
            <div class="col">
                <input type="number" name="amount" class="form-control" placeholder="Amount">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="payment_method" class="form-control" placeholder="Payment Method">
            </div>
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID">
            </div>
            <div class="col">
                <input type="date" name="payment_date" class="form-control" placeholder="Payment Date">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
