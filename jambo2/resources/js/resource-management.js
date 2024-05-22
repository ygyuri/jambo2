// client_management.js

// Function to fetch client list
function fetchClientList() {
    $.ajax({
        url: "/client-list",
        method: "POST",
        // Add data if needed
        success: function(response) {
            // Handle response and update UI
            var clients = response.clients;
            var tableBody = $('#client-table tbody');
            tableBody.empty(); // Clear previous data

            // Populate table rows with client data
            clients.forEach(function(client) {
                var row = $('<tr>');
                row.append($('<td>').text(client.name));
                row.append($('<td>').text(client.email));
                // Add more columns if needed
                row.append($('<td>').html('<button class="edit-btn" data-id="' + client.id + '">Edit</button><button class="delete-btn" data-id="' + client.id + '">Delete</button><button class="view-btn" data-id="' + client.id + '">View</button>'));
                tableBody.append(row);
            });

            // Bind events to dynamically created buttons
            $('.edit-btn').click(function() {
                var clientId = $(this).data('id');
                fetchClientDetails(clientId);
            });

            $('.delete-btn').click(function() {
                var clientId = $(this).data('id');
                deleteClient(clientId);
            });

            $('.view-btn').click(function() {
                var clientId = $(this).data('id');
                fetchClientDetails(clientId);
            });
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}

// Function to fetch client details
function fetchClientDetails(clientId) {
    $.ajax({
        url: "/client-details",
        method: "POST",
        data: { id: clientId },
        success: function(response) {
            // Handle response and update view section
            $('#client-name').text(response.client.name);
            $('#client-email').text(response.client.email);
            // Update more details if needed
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}

// Function to delete client
function deleteClient(clientId) {
    $.ajax({
        url: "/client-delete",
        method: "POST",
        data: { id: clientId },
        success: function(response) {
            // Handle success, maybe update UI or show a message
            fetchClientList(); // Refresh the client list after deletion
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}

// Function to filter clients
function filterClients() {
    var name = $('#filter-name').val();
    var email = $('#filter-email').val();
    // Send AJAX request with filter criteria
    $.ajax({
        url: "/client-filter",
        method: "POST",
        data: {
            name: name,
            email: email
        },
        success: function(response) {
            // Handle response and update UI
            var clients = response.clients;
            var tableBody = $('#client-table tbody');
            tableBody.empty(); // Clear previous data

            // Populate table rows with filtered client data
            clients.forEach(function(client) {
                var row = $('<tr>');
                row.append($('<td>').text(client.name));
                row.append($('<td>').text(client.email));
                // Add more columns if needed
                row.append($('<td>').html('<button class="edit-btn" data-id="' + client.id + '">Edit</button><button class="delete-btn" data-id="' + client.id + '">Delete</button><button class="view-btn" data-id="' + client.id + '">View</button>'));
                tableBody.append(row);
            });

            // Bind events to dynamically created buttons
            $('.edit-btn').click(function() {
                var clientId = $(this).data('id');
                fetchClientDetails(clientId);
            });

            $('.delete-btn').click(function() {
                var clientId = $(this).data('id');
                deleteClient(clientId);
            });

            $('.view-btn').click(function() {
                var clientId = $(this).data
                ('id');
                fetchClientDetails(clientId);
            });
        },
        error: function(xhr,
        status, error) {
// Handle error
console.error(error);
}
});
}

// Call fetchClientList on page load
$(document).ready(function() {
fetchClientList();

// Bind event for filter button
$('#filter-clients-btn').click(function() {
filterClients();
});

// Bind event for form submission
$('#edit-client-form').submit(function(event) {
event.preventDefault(); // Prevent default form submission
var formData = $(this).serialize(); // Serialize form data
$.ajax({
url: "/client-edit",
method: "POST",
data: formData,
success: function(response) {
// Handle success, maybe update UI or show a message
fetchClientList(); // Refresh the client list after editing
},
error: function(xhr, status, error) {
// Handle error
console.error(error);
}
});
});
});
