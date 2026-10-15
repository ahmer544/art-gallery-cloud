<?php
// Include database connection
include('db.php');

// Fetch all users
$query = "SELECT id, username, email FROM users"; // Removed status and last_login
$result = mysqli_query($conn, $query);

// Handle Edit user functionality
if (isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_status = $_POST['status']; // Status is still being edited, even if not shown in table
    
    $update_query = "UPDATE users SET username = '$new_username', email = '$new_email' WHERE id = $user_id";
    mysqli_query($conn, $update_query);
    header("Location: users_page.php"); // Redirect back to users page
    exit(); // Ensure script stops after redirect
}

// Handle Delete user functionality
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    mysqli_query($conn, $delete_query);
    header("Location: users_page.php"); // Redirect back to users page
    exit(); // Ensure script stops after redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Users</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff; /* Light Blue background */
    padding: 20px;
}

h1 {
    color: #004e92; /* Dark blue for the heading */
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #ffffff; /* White background for table */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #d1e7fd; /* Light blue border for table cells */
}

th {
    background-color: #007bff; /* Blue background for table headers */
    color: #ffffff;
}

td {
    background-color: #f7faff; /* Light blue background for table rows */
}

.button {
    padding: 8px 16px;
    text-decoration: none;
    color: white;
    background-color: #007bff; /* Main button color (Blue) */
    border-radius: 5px;
    font-size: 14px;
    margin: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.button-danger {
    background-color: #dc3545; /* Red background for delete button */
}

.button-danger:hover {
    background-color: #c82333; /* Darker red on hover */
}

#editModal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    display: none;
    z-index: 9999;
}

#editModal input, #editModal select {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #d1e7fd;
    border-radius: 5px;
}

#editModal button {
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    border: none;
    width: 100%;
}

#editModal button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

<h1>Admin Dashboard - Manage Users</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <!-- Edit User -->
                <button class="button" onclick="openEditModal(<?php echo $row['id']; ?>, '<?php echo $row['username']; ?>', '<?php echo $row['email']; ?>')">Edit</button>
                
                <!-- Delete User -->
                <a href="users_page.php?delete_user=<?php echo $row['id']; ?>" class="button button-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Edit User Modal -->
<div id="editModal" style="display:none;">
    <form method="POST" action="users_page.php">
        <input type="hidden" name="user_id" id="edit_user_id">
        <label for="username">Username:</label>
        <input type="text" name="username" id="edit_username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="edit_email" required><br><br>
        
        <label for="status">Status:</label>
        <select name="status" id="edit_status">
            <option value="online">Online</option>
            <option value="offline">Offline</option>
        </select><br><br>
        
        <input type="submit" name="edit_user" value="Update" class="button">
    </form>
    <button class="button" onclick="closeEditModal()">Close</button>
</div>

<script>
    function openEditModal(id, username, email) {
        document.getElementById("edit_user_id").value = id;
        document.getElementById("edit_username").value = username;
        document.getElementById("edit_email").value = email;
        document.getElementById("editModal").style.display = "block";
    }

    function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
    }
</script>

</body>
</html>
