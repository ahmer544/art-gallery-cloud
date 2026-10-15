<?php
session_start();
include('db.php');

// Fetch all user queries
$query = "SELECT * FROM contact_queries ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Check if there are any queries to display
if (mysqli_num_rows($result) > 0) {
    $queries_exist = true;
} else {
    $queries_exist = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View User Queries</title>
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
    margin-top: 20px;
    background-color: #ffffff; /* White background for the table */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #d1e7fd; /* Light blue border */
}

th {
    background-color: #007bff; /* Blue background for table headers */
    color: white;
}

td {
    background-color: #f7faff; /* Light blue background for table rows */
}

.reply-button {
    padding: 8px 15px;
    background-color: #28a745; /* Green background for reply button */
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    display: inline-block;
    text-align: center;
}

.reply-button:hover {
    background-color: #218838; /* Darker green on hover */
}

p {
    font-size: 18px;
    color: #333; /* Dark gray text for empty state message */
    text-align: center;
    margin-top: 40px;
}

    </style>
</head>
<body>
    <h1>User Queries</h1>

    <?php if ($queries_exist): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($query_row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($query_row['name']); ?></td>
                        <td><?php echo htmlspecialchars($query_row['email']); ?></td>
                        <td><?php echo htmlspecialchars($query_row['subject']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($query_row['message'])); ?></td>
                        <td><?php echo $query_row['created_at']; ?></td>
                        <td>
                            <a href="admin-messages.php?query_id=<?php echo $query_row['id']; ?>" class="reply-button">Reply</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No queries found at the moment.</p>
    <?php endif; ?>

</body>
</html>
