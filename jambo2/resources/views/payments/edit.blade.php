@extends('layouts.app')

@section('title', 'Edit Payment')

@section('contents')
    <h1 class="mb-0">Edit Payment</h1>
    <hr />
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Booking ID</label>
                <input type="text" name="booking_id" class="form-control" value="{{ $payment->booking_id }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Amount</label>
                <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Payment Method</label>
                <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $payment->status }}" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Transaction ID</label>
                <input type="text" name="transaction_id" class="form-control" value="{{ $payment->transaction_id }}" required>
            </div>
            <div class="mb-3 col">
                <label class="form-label">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date->format('Y-m-d') }}" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
