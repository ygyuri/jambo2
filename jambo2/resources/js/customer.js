document.addEventListener("DOMContentLoaded", function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById("client-list-link").addEventListener("click", function(event) {
        event.preventDefault();
        fetch('/client-list', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Render client list
        })
        .catch(error => console.error('Error fetching client list:', error));
    });

    document.getElementById("client-details-link").addEventListener("click", function(event) {
        event.preventDefault();
        let clientId = prompt("Enter Client ID:");
        fetch('/client-details', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ id: clientId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Render client details
        })
        .catch(error => console.error('Error fetching client details:', error));
    });

    document.getElementById("client-create-link").addEventListener("click", function(event) {
        event.preventDefault();
        let clientData = {
            name: prompt("Enter Client Name:"),
            email: prompt("Enter Client Email:")
        };
        fetch('/client-create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(clientData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Handle the created client
        })
        .catch(error => console.error('Error creating client:', error));
    });

    document.getElementById("client-edit-link").addEventListener("click", function(event) {
        event.preventDefault();
        let clientId = prompt("Enter Client ID to edit:");
        let clientData = {
            id: clientId,
            name: prompt("Enter New Client Name:"),
            email: prompt("Enter New Client Email:")
        };
        fetch('/client-edit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(clientData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Handle the updated client
        })
        .catch(error => console.error('Error editing client:', error));
    });
});
