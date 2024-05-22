@extends('layouts.app')

@section('title', 'Client List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
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
            @if($clients->count() > 0)
                @foreach($clients as $client)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $client->name }}</td>
                        <td class="align-middle">{{ $client->email }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="4">No clients found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
