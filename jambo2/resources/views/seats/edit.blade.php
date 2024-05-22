
@extends('layouts.app')

@section('title', 'Edit Seat')

@section('contents')
    <h1 class="mb-0">Edit Seat</h1>
    <hr />
    <form action="{{ route('seats.update', $seat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Seat Number</label>
                <input type="text" name="seat_number" class="form-control" value="{{ $seat->seat_number }}">
            </div>
            <div class="col">
                <label class="form-label">Class</label>
                <input type="text" name="seat_class" class="form-control" value="{{ $seat->seat_class }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Status</label>
                <input type="text" name="availability_status" class="form-control" value="{{ $seat->availability_status }}">
            </div>
            <div class="col">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $seat->price }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Flight ID</label>
                <input type="text" name="flight_id" class="form-control" value="{{ $seat->flight_id }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
