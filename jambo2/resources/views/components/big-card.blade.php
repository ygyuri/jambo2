<!-- resources/views/components/big-card.blade.php -->


{{-- CSS Link --}}
<link rel="stylesheet" href="{{ asset('css/big-card.css') }}">

<div class="big-card">
    <!-- First Section: Larger Cards -->
    <div class="section larger-section">
        <div class="larger-card">Book Flight</div>
        <div class="larger-card">Check In</div>
        <div class="larger-card">Manage My Booking</div>
    </div>

    <!-- Additional Section: Special Options -->
    <div class="section special-section">
        <div class="special-card">One Way</div>
        <div class="special-card">Round Way</div>
        <div class="special-card">Multi City</div>
        <div class="promo-card">Promo Code</div>
    </div>

    <!-- Second Section: Location and Google Maps API Integration -->
    <div class="section">
        <div class="location-card">
            <div class="location-field">
                <input type="text" id="from-location" placeholder="From">
                <button onclick="fetchLocation('from')">Fetch Location</button>
            </div>
            <div class="location-field">
                <input type="text" id="to-location" placeholder="To">
                <button onclick="fetchLocation('to')">Fetch Location</button>
            </div>
            <div class="distance">
                Distance: <span id="distance"></span>
            </div>
            <div class="price">
                Price: <span id="price"></span>
                <button onclick="toggleCurrency()">Toggle USD/Ksh</button>
            </div>
        </div>
        <div class="calendar-card">
            <input type="text" id="departure-date" placeholder="Departure Date">
            <input type="text" id="return-date" placeholder="Return Date">
            <!-- Add JavaScript to open calendar -->
        </div>
    </div>

    <!-- Third Section: Number of Clients and Search Flight -->
    <div class="section">
        <div class="card">
            <label for="num-clients">Number of Clients:</label>
            <input type="number" id="num-clients" min="1" value="1">
            <label for="age-group">Age Group:</label>
            <input type="text" id="age-group">
        </div>
        <div class="card">
            <button onclick="searchFlight()">Search Flight</button>
        </div>
    </div>

    <!-- Additional Section: Recent Searches -->
    <div class="section">
        <div class="recent-searches-card">
            <!-- Recent searches content here -->
        </div>
    </div>
</div>




{{-- JavaScript Link --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCQsKJwCT3EtFiJE0CAwwOrqROQrcA0lU&libraries=places"></script>
<script src="{{ asset('js/map.js') }}"></script>
