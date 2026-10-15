<?php
// Start the session to use session variables
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once __DIR__ . '/db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_bid'])) {
    // Get the bid amount and artwork ID from the form
    $bid_amount = $_POST['bid_amount'];
    $artwork_id = $_POST['artwork_id'];
    $user_id = 1; // Replace with the actual logged-in user's ID (e.g., from session)

    // Validate bid amount
    if (empty($bid_amount) || !is_numeric($bid_amount) || $bid_amount <= 0) {
        echo "Invalid bid amount. Please enter a valid bid.";
    } else {
        // Insert the bid into the bids table
        $sql = "INSERT INTO bids (artwork_id, user_id, bid_amount, bid_time) 
                VALUES (?, ?, ?, NOW())";

        // Prepare the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameters
            $stmt->bind_param('iid', $artwork_id, $user_id, $bid_amount);

            // Execute the query
            if ($stmt->execute()) {
                // Set the success message in the session
                $_SESSION['bid_success'] = "Your bid has been placed successfully!";

                // Redirect to the auction page
                header("Location: auction.php"); // Replace with your auction page URL
                exit(); // Make sure to call exit() after header redirect
            } else {
                echo "Error executing query: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>
