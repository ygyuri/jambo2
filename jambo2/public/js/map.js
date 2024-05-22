// File: public/js/maps.js

let currency = 'USD';
const conversionRate = 100; // Example conversion rate

function fetchLocation(type) {
    let inputId = type + '-location';
    let inputElement = document.getElementById(inputId);

    let autocomplete = new google.maps.places.Autocomplete(inputElement);
    autocomplete.addListener('place_changed', function () {
        let place = autocomplete.getPlace();
        if (!place.geometry) {
            alert('No details available for input: ' + inputElement.value);
            return;
        }
        let location = place.geometry.location;
        document.getElementById(inputId).dataset.lat = location.lat();
        document.getElementById(inputId).dataset.lng = location.lng();
        calculateDistance();
    });
}

function calculateDistance() {
    let fromLat = document.getElementById('from-location').dataset.lat;
    let fromLng = document.getElementById('from-location').dataset.lng;
    let toLat = document.getElementById('to-location').dataset.lat;
    let toLng = document.getElementById('to-location').dataset.lng;

    if (fromLat && fromLng && toLat && toLng) {
        let from = new google.maps.LatLng(fromLat, fromLng);
        let to = new google.maps.LatLng(toLat, toLng);
        let distance = google.maps.geometry.spherical.computeDistanceBetween(from, to) / 1000; // in km

        document.getElementById('distance').textContent = distance.toFixed(2) + ' km';
        calculatePrice(distance);
    }
}

function calculatePrice(distance) {
    let ratePerKm = 0.5; // Example rate
    let price = distance * ratePerKm;
    document.getElementById('price').textContent = currency === 'USD' ? `$${price.toFixed(2)}` : `Ksh ${(price * conversionRate).toFixed(2)}`;
}

function toggleCurrency() {
    currency = currency === 'USD' ? 'Ksh' : 'USD';
    let distance = parseFloat(document.getElementById('distance').textContent);
    if (distance) {
        calculatePrice(distance);
    }
}

function searchFlight() {
    let fromLocation = document.getElementById('from-location').value;
    let toLocation = document.getElementById('to-location').value;
    let numClients = document.getElementById('num-clients').value;
    let ageGroup = document.getElementById('age-group').value;

    alert(`Searching flight from ${fromLocation} to ${toLocation} for ${numClients} clients in age group ${ageGroup}`);
}
