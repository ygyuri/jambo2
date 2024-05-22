@extends('layouts.app')

@section('title', 'Admin List')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Admin List</h1>
    <a href="{{ route('admins.create') }}" class="btn btn-primary">Add Admin</a>
</div>
<hr />
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($admins->count() > 0)
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Admin Actions">
                            <a href="{{ route('admins.show', $admin->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No admins found</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
