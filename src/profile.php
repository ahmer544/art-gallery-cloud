<?php
session_start();
include('db.php');  // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect if user is not logged in
    exit();
}

// Fetch notifications for the logged-in user
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM admin_messages WHERE user_id = $user_id ORDER BY message_date DESC";
$result = mysqli_query($conn, $query);

// Check if there are any notifications
if (mysqli_num_rows($result) > 0) {
    $notifications_exist = true;
} else {
    $notifications_exist = false;
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="UTF-8">
    <title>User Notifications</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

		.container{
			margin-top: 50px;
		}
        .notification-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 140px;
        }

        .notification-table th, .notification-table td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        .notification-table th {
            background-color: #88d200;
            color: white;
          
        }

        .notification-table tr {
            background-color: #fff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .notification-table tr:hover {
            background-color: #e3f2e1;
            transform: scale(1.02);
        }

        .notification-table td {
            border-bottom: 1px solid #ddd;
            color: #555;
        }

        .notification-status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
        }

        .unread {
            background-color: #f44336;
            color: white;
        }

        .read {
            background-color: #88d200;
            color: white;
        }

        .notification-button {
            padding: 12px 25px;
            background-color: #88d200;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .notification-button:hover {
            background-color:rgb(107, 158, 12);
			color: white;
        }

        .logout-btn {
            position: fixed;
            top: 120px;
            right: 20px;
            background-color: #88d200;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logout-btn:hover {
            background-color: rgb(117, 173, 11);
            transform: scale(1.05);
        }

        .banner-area {
            background-color: #88d200;
            padding: 50px 0;
            color: white;
            text-align: center;
        }

        .banner-area h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .banner-area p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<header>
    <?php include "navbar.php"; ?>
</header>

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Profile</h1>
                <p class="text-white link-nav"><a href="home.php">Home</a> <span class="lnr lnr-arrow-right"></span> <a href="notifications.php">Profile</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Notifications Section -->
<div class="container">
    <h3>User Notifications</h3>

    <?php if ($notifications_exist): ?>
        <table class="notification-table">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Date Received</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php while ($notification = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo nl2br(htmlspecialchars($notification['message'])); ?></td>
                        <td><?php echo $notification['message_date']; ?></td>
                       
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No new notifications.</p>
    <?php endif; ?>

    <a href="logout.php" class="notification-button">Logout</a>
</div>



<footer>
    <?php include "footer.php"; ?>
</footer>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
