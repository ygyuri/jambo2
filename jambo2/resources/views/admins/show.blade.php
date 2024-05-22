@extends('layouts.app')

@section('title', 'Show Admin')

@section('contents')
    <h1 class="mb-0">Admin Details</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $admin->name }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $admin->created_at }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $admin->updated_at }}" readonly>
        </div>
    </div>
@endsection
