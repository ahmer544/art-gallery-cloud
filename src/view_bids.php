<?php
session_start();
include('db.php'); // Include database connection

// Fetch auction ID from URL
$auction_id = $_GET['auction_id'];

// Fetch auction details
$auction_query = "SELECT * FROM auction_items WHERE id = '$auction_id'";
$auction_result = mysqli_query($conn, $auction_query);
$auction = mysqli_fetch_assoc($auction_result);

// Fetch all bids for the selected auction, ordered by bid amount (highest first)
$query = "SELECT b.bid_amount, b.bid_time, u.username AS bidder_name, u.email AS bidder_email 
          FROM bids AS b 
          JOIN users AS u ON b.user_id = u.id 
          WHERE b.artwork_id = '$auction_id' 
          ORDER BY b.bid_amount DESC";

$bids_result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bids for Auction: <?php echo htmlspecialchars($auction['title']); ?></title>
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
        .notify-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .notify-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Bids for Auction: <?php echo htmlspecialchars($auction['title']); ?> (Artist: <?php echo htmlspecialchars($auction['artist']); ?>)</h1>

    <?php if (mysqli_num_rows($bids_result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Bidder Name</th>
                    <th>Bid Amount</th>
                    <th>Bid Time</th>
                    <th>Bidder Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($bid = mysqli_fetch_assoc($bids_result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bid['bidder_name']); ?></td>
                        <td><?php echo htmlspecialchars($bid['bid_amount']); ?></td>
                        <td><?php echo $bid['bid_time']; ?></td>
                        <td><?php echo htmlspecialchars($bid['bidder_email']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Winning Bid</h2>
        <?php 
        // Get the highest bid (first row)
        mysqli_data_seek($bids_result, 0); // Reset the pointer to the first row
        $highest_bid = mysqli_fetch_assoc($bids_result);

        if ($highest_bid) {
            echo "<p>The winning bid is: $" . $highest_bid['bid_amount'] . " by " . htmlspecialchars($highest_bid['bidder_name']) . " (" . htmlspecialchars($highest_bid['bidder_email']) . ")</p>";
        }
        ?>

        <!-- ✅ Notify Users Button -->
        <a href="admin-messages.php?auction_id=<?php echo $auction_id; ?>" class="notify-btn">Notify Users</a>

    <?php else: ?>
        <p>No bids placed for this auction yet.</p>
    <?php endif; ?>

</body>
</html>
