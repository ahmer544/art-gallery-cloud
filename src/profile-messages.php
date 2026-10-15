<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Mark messages as read when the user views them
$user_id = $_SESSION['user_id'];
$query = "UPDATE admin_messages SET status = 'read' WHERE user_id = $user_id AND status = 'unread'";
mysqli_query($conn, $query);

// Fetch all messages for the logged-in user
$query = "SELECT * FROM admin_messages WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Messages</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Your Messages from Admin</h1>

    <table>
        <thead>
            <tr>
                <th>Message</th>
                <th>Date Sent</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($message = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                    <td><?php echo $message['message_date']; ?></td>
                    <td><?php echo ucfirst($message['status']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
