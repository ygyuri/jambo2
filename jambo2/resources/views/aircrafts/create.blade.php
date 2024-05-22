
@extends('layouts.app')

@section('title', 'Create Aircraft')

@section('contents')
<h1 class="mb-0">Add Aircraft</h1>
<hr />
<form action="{{ route('aircrafts.store') }}" method="POST">
    @csrf
    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="col">
            <label class="form-label">Manufacturer</label>
            <input type="text" name="manufacturer" class="form-control" placeholder="Manufacturer">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Registration Number</label>
            <input type="text" name="registration_number" class="form-control" placeholder="Registration Number">
        </div>
        <div class="col">
            <label class="form-label">Sitting Capacity</label>
            <input type="number" name="sitting_capacity" class="form-control" placeholder="Sitting Capacity">
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
