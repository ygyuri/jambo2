@extends('layouts.app')

@section('title', 'Add Airport')

@section('contents')
    <h1>Add Airport</h1>
    <hr />
    <form action="{{ route('airports.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3 col">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="City">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" placeholder="Country">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" placeholder="Latitude">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" placeholder="Longitude">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Timezone</label>
                <input type="text" name="timezone" class="form-control" placeholder="Timezone">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Elevation</label>
                <input type="text" name="elevation" class="form-control" placeholder="Elevation">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
