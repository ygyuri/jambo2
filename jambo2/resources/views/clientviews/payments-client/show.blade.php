

@extends('layouts.client')

@section('title', 'Show Payment')

@section('contents')
    <h1 class="mb-0">Payment Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Booking ID</label>
            <input type="text" class="form-control" value="{{ $payment->booking_id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Amount</label>
            <input type="text" class="form-control" value="{{ $payment->amount }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" class="form-control" value="{{ $payment->payment_method }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ $payment->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Transaction ID</label>
            <input type="text" class="form-control" value="{{ $payment->transaction_id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Payment Date</label>
            <input type="text" class="form-control" value="{{ $payment->payment_date }}" readonly>
        </div>
    </div>
@endsection
