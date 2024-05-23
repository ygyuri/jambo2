@extends('layouts.client')

@section('title', 'Create Payment')

@section('contents')
    <h1 class="mb-0">Add Payment</h1>
    <hr />
    <form action="{{ route('client.payments.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="booking_id" class="form-label">Booking ID</label>
                <input type="text" name="booking_id" class="form-control" placeholder="Booking ID">
            </div>
            <div class="col">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" name="amount" class="form-control" placeholder="Amount">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="payment_method" class="form-label">Payment Method</label>
                <input type="text" name="payment_method" class="form-control" placeholder="Payment Method">
            </div>
            <div class="col">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="transaction_id" class="form-label">Transaction ID</label>
                <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID">
            </div>
            <div class="col">
                <label for="payment_date" class="form-label">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" placeholder="Payment Date">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" name="notes" placeholder="Notes"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
