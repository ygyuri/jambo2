<!-- resources/views/components/slideshow.blade.php -->
<div class="sliding-image-container">
    <div class="slide active">
        <div class="image-wrapper">
            <img src="{{ asset('images/image1.jpg') }}" alt="Image 1">
        </div>
    </div>
    <div class="slide">
        <div class="image-wrapper">
            <img src="{{ asset('images/image2.jpg') }}" alt="Image 2">
        </div>
    </div>
    <div class="slide">
        <div class="image-wrapper">
            <img src="{{ asset('images/image3.jpg') }}" alt="Image 3">
        </div>
    </div>
    <div class="slide">
        <div class="image-wrapper">
            <img src="{{ asset('images/image4.jpg') }}" alt="Image 4">
        </div>
    </div>
</div>

<!-- Navigation dots -->
<div class="navigation-dots">
    <!-- Dots will be dynamically added here by JavaScript -->
</div>

<!-- Link to your CSS file -->
<link rel="stylesheet" href="{{ asset('css/sliding-styles.css') }}">

<!-- Link to your JavaScript file -->
<script src="{{ asset('js/sliding-script.js') }}" defer></script>
