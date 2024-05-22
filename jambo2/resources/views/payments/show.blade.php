@extends('layouts.app')

@section('title', 'Show Payment')

@section('contents')
    <h1 class="mb-0">Detail Payment</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Booking ID</label>
            <input type="text" name="booking_id" class="form-control" value="{{ $payment->booking_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $payment->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Transaction ID</label>
            <input type="text" name="transaction_id" class="form-control" value="{{ $payment->transaction_id }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Payment Date</label>
            <input type="text" name="payment_date" class="form-control" value="{{ $payment->payment_date }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" value="{{ $payment->created_at }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $payment->updated_at }}" readonly>
        </div>
    </div>
@endsection
