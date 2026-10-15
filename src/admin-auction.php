<?php
session_start();
include('db.php'); // Include database connection

// Fetch all active auctions where the end time is greater than the current time
$query = "SELECT * FROM auction_items WHERE end_time >= NOW() ORDER BY end_time ASC";
$auctions_result = mysqli_query($conn, $query);

// Check if there are any active auctions
$auctions_exist = mysqli_num_rows($auctions_result) > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Active Auctions</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f8ff; /* Light blue background */
    padding: 20px;
}

h1 {
    color: #004e92; /* Dark blue for heading */
    margin-bottom: 20px;
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

.view-bids-button {
    padding: 8px 16px;
    background-color: #007bff; /* Blue button */
    color: white;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    text-align: center;
}

.view-bids-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.view-bids-button:active {
    background-color: #004084; /* Even darker blue when clicked */
}

p {
    font-size: 18px;
    color: #333; /* Darker gray for message text */
}

    </style>
</head>
<body>
    <h1>Active Auctions</h1>

    <?php if ($auctions_exist): ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Start Price</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($auction = mysqli_fetch_assoc($auctions_result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($auction['title']); ?></td>
                        <td><?php echo htmlspecialchars($auction['artist']); ?></td>
                        <td><?php echo htmlspecialchars($auction['start_price']); ?></td>
                        <td><?php echo $auction['end_time']; ?></td>
                        <td>
                            <a href="view_bids.php?auction_id=<?php echo $auction['id']; ?>" class="view-bids-button">View Bids</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No active auctions found.</p>
    <?php endif; ?>

</body>
</html>
