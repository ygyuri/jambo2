@extends('layouts.app')

@section('title', 'Edit Airport')

@section('contents')
    <h1>Edit Airport</h1>
    <hr />
    <form action="{{ route('airports.update', $airport->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $airport->name }}">
            </div>
            <div class="mb-3 col">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="{{ $airport->city }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ $airport->country }}">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" value="{{ $airport->latitude }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" value="{{ $airport->longitude }}">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Timezone</label>
                <input type="text" name="timezone" class="form-control" value="{{ $airport->timezone }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Elevation</label>
                <input type="text" name="elevation" class="form-control" value="{{ $airport->elevation }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
