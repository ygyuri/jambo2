@extends('layouts.app')

@section('title', 'Edit Aircraft')

@section('contents')
<h1 class="mb-0">Edit Aircraft</h1>
<hr />
<form action="{{ route('aircrafts.update', $aircraft->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $aircraft->name }}" required>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Manufacturer</label>
            <input type="text" name="manufacturer" class="form-control" value="{{ $aircraft->manufacturer }}" required>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Registration Number</label>
            <input type="text" name="registration_number" class="form-control" value="{{ $aircraft->registration_number }}" required>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Sitting Capacity</label>
            <input type="number" name="sitting_capacity" class="form-control" value="{{ $aircraft->sitting_capacity }}" required min="1">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
