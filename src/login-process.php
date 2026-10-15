<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Query to fetch user details based on email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];

            // Update user's online status to 1 and set the last activity time
            $updateStatus = "UPDATE users SET is_online = 1, last_activity = NOW() WHERE id = " . $row['id'];
            mysqli_query($conn, $updateStatus);

            // Log the login activity
            $log_activity = "INSERT INTO user_activity_log (user_id, activity_type) VALUES ({$row['id']}, 'login')";
            mysqli_query($conn, $log_activity);

            // Set cookies if "Remember Me" is checked
            if ($remember) {
                setcookie("email", $email, time() + (86400 * 30), "/"); // 30 days
                setcookie("password", $password, time() + (86400 * 30), "/");
            } else {
                setcookie("email", "", time() - 3600, "/");
                setcookie("password", "", time() - 3600, "/");
            }

            // Redirect to the dashboard
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "No user found with that email.";
    }
}

$conn->close();
?>
