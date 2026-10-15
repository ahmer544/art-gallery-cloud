<?php
session_start();
include('db.php'); // Make sure to configure your DB connection here

// Process the admin action to accept or reject the membership application
if (isset($_GET['action']) && isset($_GET['id'])) {
    $application_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'accept' || $action === 'reject') {
        $status = ($action === 'accept') ? 'accepted' : 'rejected';

        // Update the membership status in the database
        $query = "UPDATE memberships SET status = '$status' WHERE id = $application_id";
        if (mysqli_query($conn, $query)) {
            // Fetch user details for sending the email
            $query = "SELECT * FROM memberships WHERE id = $application_id";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            // Prepare email
            $to = $user['email'];
            $subject = "Membership Application Status";
            $message = "Dear {$user['full_name']},\n\n";
            if ($status === 'accepted') {
                $message .= "Congratulations! Your membership application has been accepted. Welcome to our community.\n\n";
            } else {
                $message .= "We regret to inform you that your membership application has been rejected. Thank you for your interest.\n\n";
            }
            $message .= "Regards,\nArt Gallery Team";

            $headers = "From: no-reply@artgallery.com";

            // Send email notification
            mail($to, $subject, $message, $headers);

            // Redirect to dashboard after processing
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error updating application status.";
        }
    } else {
        echo "Invalid action.";
    }
}

// Fetch all pending membership applications
$query = "SELECT * FROM memberships WHERE status = 'pending'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Applications</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f4f8ff; /* Light blue background */
    padding: 20px;
}

h1 {
    text-align: center;
    color: #005f99; /* Dark blue for the heading */
    margin-bottom: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #ffffff; /* White background for the table */
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
    color: white;
}

td {
    background-color: #f7faff; /* Light blue background for table rows */
}

.action-btn {
    padding: 6px 14px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    margin: 5px;
}

.accept {
    background-color: #28a745; /* Green for accept button */
}

.reject {
    background-color: #dc3545; /* Red for reject button */
}

.action-btn:hover {
    opacity: 0.8; /* Slight opacity effect on hover */
}

.action-btn:active {
    opacity: 0.6; /* Slightly darker effect on click */
}

p {
    font-size: 18px;
    color: #333; /* Darker gray for message text */
}

    </style>
</head>
<body>
    <h1>Membership Applications</h1>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Membership Type</th>
                <th>Message</th>
                <th>Application Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['membership_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo htmlspecialchars($row['application_date']); ?></td>
                    <td>
                        <a href="?action=accept&id=<?php echo $row['id']; ?>" class="action-btn accept">Accept</a>
                        <a href="?action=reject&id=<?php echo $row['id']; ?>" class="action-btn reject">Reject</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
