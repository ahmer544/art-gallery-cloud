<?php
// Database connection
require_once __DIR__ . '/db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email from the form submission
    $email = $_POST['email'];

    // Sanitize the email to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Check if the email already exists in the database
    $checkEmail = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        echo "This email is already subscribed!";
    } else {
        // Insert the email into the database (assume you have a 'newsletter_subscribers' table)
        $sql = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Thank you for subscribing to our newsletter!";
            
            // Send confirmation email (optional)
            $subject = "Newsletter Subscription Confirmation";
            $message = "Thank you for subscribing to our newsletter! Stay tuned for updates.";
            $headers = "From: no-reply@yourwebsite.com";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>
