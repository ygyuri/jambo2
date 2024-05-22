@extends('layouts.client')  @section('title', 'Create Booking')

@section('content') <h1>Create Booking</h1>
  <hr />

  <form action="{{ route('client.bookings.store') }}" method="POST" enctype="multipart/form-data"> @csrf

    <div class="mb-3">
      <label for="flight_id" class="form-label">Select Flight</label>
      <select name="flight_id" id="flight_id" class="form-select" required>
        @foreach ($flights as $flight)
          <option value="{{ $flight->id }}">{{ $flight->flight_number }} ({{ $flight->departure_airport->code }} - {{ $flight->arrival_airport->code }})</option>
        @endforeach
      </select>
      @error('flight_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="passenger_count" class="form-label">Number of Passengers</label>
      <input type="number" name="passenger_count" class="form-control" id="passenger_count" min="1" required>
      @error('passenger_count')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="total_price" class="form-label">Total Price</label>
      <input type="number" name="total_price" class="form-control" id="total_price" required readonly>  @error('total_price')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Booking</button>
  </form>
@endsection

@section('scripts')
  @if(session('success'))
  <script>
    Swal.fire({
      title: 'Success!',
      text: '{{ session('success') }}',
      icon: 'success',
      confirmButtonText: 'OK'
    });
  </script>
  @endif
  @if(session('error'))
  <script>
    Swal.fire({
      title: 'Error!',
      text: '{{ session('error') }}',
      icon: 'error',
      confirmButtonText: 'OK'
    });
  </script>
  @endif
@endsection
