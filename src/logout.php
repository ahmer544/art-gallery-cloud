<?php
include('db.php');
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Update the user's online status to offline
    $updateStatus = "UPDATE users SET is_online = 0 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateStatus);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    // Log the logout activity
    $log_activity = "INSERT INTO user_activity_log (user_id, activity_type) VALUES (?, 'logout')";
    $logStmt = mysqli_prepare($conn, $log_activity);
    mysqli_stmt_bind_param($logStmt, "i", $userId);
    mysqli_stmt_execute($logStmt);

    // Destroy the session to log the user out
    session_unset();
    session_destroy();

    // Redirect to the login page or homepage
    header("Location: index.php");
    exit();
} else {
    // If user is not logged in, redirect to login page
    header("Location: index.php");
    exit();
}

$conn->close();
?>
