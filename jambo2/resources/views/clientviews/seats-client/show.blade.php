@extends('layouts.client')

@section('title', 'Show Seat')

@section('contents')
    @if($seat->client_id == auth()->user()->id)
        <h1 class="mb-0">Detail Seat</h1>
        <hr />
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Seat Number</label>
                <input type="text" class="form-control" value="{{ $seat->seat_number }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">Class</label>
                <input type="text" class="form-control" value="{{ $seat->seat_class }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" value="{{ $seat->availability_status }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" value="{{ $seat->formatted_price }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Flight ID</label>
                <input type="text" class="form-control" value="{{ $seat->flight_id }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Created At</label>
                <input type="text" class="form-control" value="{{ $seat->created_at }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">Updated At</label>
                <input type="text" class="form-control" value="{{ $seat->updated_at }}" readonly>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            You do not have permission to view these details.
        </div>
        <a href="{{ route('seats.index') }}" class="btn btn-secondary">Back to List</a>
    @endif
@endsection
