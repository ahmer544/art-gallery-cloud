<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = '';
$error_message = '';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $tickets_to_buy = (int)$_POST['tickets'];

    // Validate the ticket count
    if ($tickets_to_buy > 0 && $tickets_to_buy <= 3) {
        // Insert the ticket purchase into the database
        $sql = "INSERT INTO ticket_purchases (name, email, tickets) 
                VALUES ('$name', '$email', $tickets_to_buy)";
        
        if ($conn->query($sql) === TRUE) {
            // After successful insertion, redirect to payment page
            $ticket_id = $conn->insert_id;  // Get the ID of the inserted ticket record
            $amount = 2000 * $tickets_to_buy;  // Amount in cents or the required payment amount

            // Construct the URL for payment.php with necessary parameters
            $payment_page_url = "payment.php?ticket_id=" . $ticket_id . "&amount=" . $amount . "&name=" . urlencode($name) . "&email=" . urlencode($email);
            
            // Redirect to the payment page
            header("Location: " . $payment_page_url);
            exit(); // Make sure no further code is executed after the redirect
        } else {
            $error_message = "Error: " . $conn->error;
        }
    } else {
        $error_message = "You can only purchase between 1 and 3 tickets.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibition Ticket Purchase</title>
    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Container for the form */
        .container {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            text-align: center;
            box-sizing: border-box;
        }

        /* Heading */
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Form Label and Inputs */
        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Button Styles */
        button {
            padding: 12px 20px;
            background-color:#88d200;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Error and Success Message Styles */
        .error, .success {
            color: red;
            font-size: 16px;
            margin-top: 20px;
        }

        .success {
            color: green;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            input[type="text"],
            input[type="email"],
            input[type="number"] {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2> Ticket Purchase</h2>

        <!-- Success or Error Message -->
        <?php if ($success_message) { echo "<div class='success'>$success_message</div>"; } ?>
        <?php if ($error_message) { echo "<div class='error'>$error_message</div>"; } ?>

        <!-- Ticket Purchase Form -->
        <form method="POST" action="">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="tickets">Number of Tickets</label>
            <input type="number" name="tickets" id="tickets" min="1" max="3" required>

            <button type="submit">Buy Tickets</button>
        </form>
    </div>

</body>
</html>
