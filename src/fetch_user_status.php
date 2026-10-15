<?php
include('db.php');

// Set users offline if inactive for more than 5 minutes
$inactive_limit = 300; // 5 minutes
mysqli_query($conn, "UPDATE users SET is_online = 0 WHERE TIMESTAMPDIFF(SECOND, last_activity, NOW()) > $inactive_limit");

// Fetch updated statuses
$query = "SELECT id, username, is_online FROM users";
$result = mysqli_query($conn, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);
?>
