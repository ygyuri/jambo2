@extends('layouts.app')

@section('title', 'Create Client')

@section('contents')
    <h1 class="mb-0">Add Client</h1>
    <hr />
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
