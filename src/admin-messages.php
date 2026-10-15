<?php
session_start();
include('db.php');

// Process the form submission for sending messages
if (isset($_POST['send_message'])) {
    $user_id = $_POST['user_id'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert the message into the admin_messages table
    $query = "INSERT INTO admin_messages (user_id, message) VALUES ('$user_id', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message.";
    }
}

// Fetch all users who need to receive a message (you can filter this based on your needs)
$query = "SELECT * FROM memberships WHERE status = 'accepted'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Admin Message</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f8ff; /* Light blue background for a clean look */
    padding: 20px;
}

h1 {
    text-align: center;
    color: #005f99; /* Dark blue for the heading */
    margin-bottom: 30px;
}

h2 {
    color: #007bff; /* Blue color for subheadings */
    margin-top: 40px;
}

form {
    background-color: #ffffff; /* White background for the form */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    width: 50%;
    margin: 0 auto;
}

label {
    font-size: 16px;
    color: #333;
}

select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    background-color: #007bff; /* Blue background for the button */
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
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

textarea {
    height: 150px; /* Set a height for the message textarea */
    resize: vertical; /* Allow resizing vertically */
}

p {
    font-size: 18px;
    color: #333; /* Dark gray text color for messages */
}

    </style>
</head>
<body>
    <h1>Send Message to User</h1>

    <form action="" method="POST">
        <label for="user_id">Select User:</label>
        <select name="user_id" required>
            <option value="">--Select User--</option>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['full_name']; ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" required></textarea><br><br>

        <button type="submit" name="send_message">Send Message</button>
    </form>

    <h2>Sent Messages</h2>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Message</th>
                <th>Date Sent</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch sent messages
            $query = "SELECT m.full_name, am.message, am.message_date, am.status FROM admin_messages am
                      JOIN memberships m ON am.user_id = m.id";
            $messages_result = mysqli_query($conn, $query);

            while ($message = mysqli_fetch_assoc($messages_result)):
            ?>
                <tr>
                    <td><?php echo $message['full_name']; ?></td>
                    <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                    <td><?php echo $message['message_date']; ?></td>
                    <td><?php echo ucfirst($message['status']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
