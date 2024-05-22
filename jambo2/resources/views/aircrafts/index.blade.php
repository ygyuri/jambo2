@extends('layouts.app')

@section('title', 'List Aircraft')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Aircraft</h1>
    <a href="{{ route('aircrafts.create') }}" class="btn btn-primary">Add Aircraft</a>
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
            <th>Manufacturer</th>
            <th>Registration Number</th>
            <th>Sitting Capacity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($aircrafts as $aircraft)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $aircraft->name }}</td>
            <td>{{ $aircraft->manufacturer }}</td>
            <td>{{ $aircraft->registration_number }}</td>
            <td>{{ $aircraft->sitting_capacity }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('aircrafts.show', $aircraft->id) }}" class="btn btn-secondary">Detail</a>
                    <a href="{{ route('aircrafts.edit', $aircraft->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('aircrafts.destroy', $aircraft->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="6">No aircraft found</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $aircrafts->links() }} <!-- Pagination links -->
@endsection
