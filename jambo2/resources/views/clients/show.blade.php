@extends('layouts.app')

@section('title', 'Show Client')

@section('contents')
    <h1 class="mb-0">Client Details</h1>
    <hr />
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $client->name }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $client->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value="{{ $client->created_at }}" readonly>
        </div>
        <div class="mb-3 col">
            <label class="form-label">Updated At</label>
            <input type="text" class="form-control" value="{{ $client->updated_at }}" readonly>
        </div>
    </div>
@endsection
