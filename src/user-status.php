<?php
include('db.php');

// Fetch all users with online status
$query = "SELECT id, username, email, is_online, last_activity FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status Tracker</title>
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

.status-indicator {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 8px;
}

.online {
    background-color: #28a745; /* Green for online status */
}

.offline {
    background-color: #dc3545; /* Red for offline status */
}

    </style>
</head>
<body>

<h1>User Activity Status</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Last Activity</th>
    </tr>
    <tbody id="userStatusTable">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <span class="status-indicator <?php echo $row['is_online'] ? 'online' : 'offline'; ?>"></span>
                    <?php echo $row['is_online'] ? 'Online' : 'Offline'; ?>
                </td>
                <td><?php echo $row['last_activity']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



</body>
</html>
