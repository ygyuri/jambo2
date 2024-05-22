@extends('layouts.landing')

@section('content')
    @include('components.header') <!-- Include the header component only in this page -->

    <main>
        <div class="container">
            <h1>Welcome to Our Flight Booking System</h1>
            <!-- Add more content and components here as needed -->
            @include('components.slideshow') <!-- Include the slideshow component -->
            <!-- Add a container for the BigCard component -->
            <div id="big-card-container">
                <x-big-card />
            </div>
        </div>
    </main>
@endsection
