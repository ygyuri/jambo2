@extends('layouts.client')

@section('title', 'Airport Details')

@section('contents')
    <h1>Airport Details</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $airport->name }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">City</label>
            <input type="text" class="form-control" value="{{ $airport->city }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" value="{{ $airport->country }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Latitude</label>
            <input type="text" class="form-control" value="{{ $airport->latitude }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Longitude</label>
            <input type="text" class="form-control" value="{{ $airport->longitude }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Timezone</label>
            <input type="text" class="form-control" value="{{ $airport->timezone }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Elevation</label>
            <input type="text" class="form-control" value="{{ $airport->elevation }}" readonly>
        </div>
    </div>
@endsection
