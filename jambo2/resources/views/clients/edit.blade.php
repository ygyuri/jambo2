@extends('layouts.app')

@section('title', 'Edit Client')

@section('contents')
    <h1 class="mb-0">Edit Client</h1>
    <hr />
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
            </div>
            <div class="col">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
