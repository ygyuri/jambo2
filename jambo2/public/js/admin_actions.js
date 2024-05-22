// admin_actions.js
function fetchAdminList() {
    $.ajax({
        url: '{{ route('admin.list') }}',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            let tableBody = '';
            response.data.forEach(admin => {
                tableBody += `
                    <tr>
                        <td>${admin.name}</td>
                        <td>${admin.email}</td>
                        <td>
                            <!-- Add action buttons here if necessary -->
                        </td>
                    </tr>
                `;
            });
            $('#adminTableBody').html(tableBody);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    fetchAdminList();
});





function fetchAdminDetails(adminId) {
    $.ajax({
        url: '/admin-details',
        type: 'POST',
        dataType: 'json',
        data: { id: adminId },
        success: function(response) {
            // Handle the response here, maybe display details in a modal
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function createAdmin() {
    var name = prompt("Enter admin name:");
    var email = prompt("Enter admin email:");
    var password = prompt("Enter admin password:");

    $.ajax({
        url: '/admin-create',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            email: email,
            password: password
        },
        success: function(response) {
            // Handle the response here, maybe show a success message
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function editAdmin(adminId) {
    var name = prompt("Enter new name:");
    var email = prompt("Enter new email:");
    var password = prompt("Enter new password (leave empty to keep current):");

    $.ajax({
        url: '/admin-edit',
        type: 'POST',
        dataType: 'json',
        data: {
            id: adminId,
            name: name,
            email: email,
            password: password
        },
        success: function(response) {
            // Handle the response here, maybe show a success message
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function deleteAdmin(adminId) {
    if (confirm("Are you sure you want to delete this admin?")) {
        $.ajax({
            url: '/admin-delete',
            type: 'POST',
            dataType: 'json',
            data: { id: adminId },
            success: function(response) {
                // Handle the response here, maybe show a success message
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
}

function filterAdmins() {
    var name = prompt("Enter admin name to filter:");
    var email = prompt("Enter admin email to filter:");

    $.ajax({
        url: '/admin-filter',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            email: email
        },
        success: function(response) {
            // Handle the response here, maybe display in a modal or update a table
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
