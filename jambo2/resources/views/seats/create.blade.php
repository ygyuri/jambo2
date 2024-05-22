
@extends('layouts.app')

@section('title', 'Create Seat')

@section('contents')
    <h1 class="mb-0">Add Seat</h1>
    <hr />
    <form action="{{ route('seats.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="seat_number" class="form-control" placeholder="Seat Number">
            </div>
            <div class="col">
                <input type="text" name="seat_class" class="form-control" placeholder="Class">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="availability_status" class="form-control" placeholder="Status">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="flight_id" class="form-control" placeholder="Flight ID">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
