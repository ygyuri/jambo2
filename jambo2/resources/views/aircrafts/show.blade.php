
@extends('layouts.app')

@section('title', 'Show Aircraft')

@section('contents')
<h1 class="mb-0">Detail Aircraft</h1>
<hr />
<div class="row">
    <div class="mb-3 col">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $aircraft->name }}" readonly>
    </div>
    <div class="mb-3 col">
        <label class="form-label">Manufacturer</label>
        <input type="text" name="manufacturer" class="form-control" value="{{ $aircraft->manufacturer }}" readonly>
    </div>
</div>
<div class="row">
    <div class="mb-3 col">
        <label class="form-label">Registration Number</label>
        <input type="text" name="registration_number" class="form-control" value="{{ $aircraft->registration_number }}" readonly>
    </div>
    <div class="mb-3 col">
        <label class="form-label">Sitting Capacity</label>
        <input type="number" name="sitting_capacity" class="form-control" value="{{ $aircraft->sitting_capacity }}" readonly>
    </div>
</div>
<div class="row">
    <div class="mb-3 col">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" value="{{ $aircraft->created_at }}" readonly>
    </div>
    <div class="mb-3 col">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" value="{{ $aircraft->updated_at }}" readonly>
    </div>
</div>
@endsection
