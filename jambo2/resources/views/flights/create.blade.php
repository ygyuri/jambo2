

@extends('layouts.app')

@section('title', 'Create Flight')

@section('contents')
    <h1 class="mb-0">Add Flight</h1>
    <hr />
    <form action="{{ route('flights.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="flight_number" class="form-control" placeholder="Flight Number" required>
            </div>
            <div class="col">
                <input type="text" name="departure_airport_id" class="form-control" placeholder="Departure Airport ID" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="arrival_airport_id" class="form-control" placeholder="Arrival Airport ID" required>
            </div>
            <div class="col">
                <input type="datetime-local" name="departure_time" class="form-control" placeholder="Departure Time" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="datetime-local" name="arrival_time" class="form-control" placeholder="Arrival Time" required>
            </div>
            <div class="col">
                <input type="text" name="duration" class="form-control" placeholder="Duration" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="aircraft_id" class="form-control" placeholder="Aircraft ID" required>
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status" required>
            </div>
            <div class="col">
                <input type="text" name="available_seats" class="form-control" placeholder="Available Seats" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection


@section('scripts')
@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        title: 'Error!',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection
