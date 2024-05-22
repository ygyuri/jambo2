@extends('layouts.app')

@section('title', 'Create Payment')

@section('contents')
    <h1 class="mb-0">Add Payment</h1>
    <hr />
    <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="booking_id" class="form-control" placeholder="Booking ID" required>
            </div>
            <div class="col">
                <input type="text" name="amount" class="form-control" placeholder="Amount" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="payment_method" class="form-control" placeholder="Payment Method" required>
            </div>
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID" required>
            </div>
            <div class="col">
                <input type="date" name="payment_date" class="form-control" placeholder="Payment Date" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
