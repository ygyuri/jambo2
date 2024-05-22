@extends('layouts.app')

@section('title', 'Edit Admin')

@section('contents')
    <h1 class="mb-0">Edit Admin</h1>
    <hr />
    <form action="{{ route('admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $admin->name }}" >
            </div>
            <div class="mb-3 col">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" >
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
