<?php
// Include variables ($host, $user, $password, $database, $port)
require_once __DIR__ . '/db.php';

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


    // Handle form submission
    $message = ""; // To store feedback message
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $membership_type = $_POST['membership_type'];
        $user_message = $_POST['message'] ?? '';

        // Insert data into the table
        $stmt = $pdo->prepare("INSERT INTO memberships (full_name, email, phone, membership_type, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $phone, $membership_type, $user_message]);

        // Redirect to payment page after successful submission
        header("Location: payment.php");
        exit(); // Ensure the script stops after redirection
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="UTF-8">
    <title>Art Museum</title>
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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .membership-section {
            padding: 40px;
            text-align: center;
        }

        .membership-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .membership-section p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            text-align: left;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #333;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #88d200;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: green;
        }

        .membership-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .membership-button:hover {
            background-color: hsl(211, 100.00%, 35.10%, 45%);
        }

    </style>
</head>
<body>

<header>
    <?php include "navbar.php"; ?>    
</header><!-- #header -->

<!-- start banner Area -->
<section class="banner-area relative" id="home">    
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Membership</h1>    
                <p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="membership.php"> Membership</a></p>
            </div>                                            
        </div>
    </div>
</section>
<!-- End banner Area -->    

<div class="membership-section">
    <h2>Become a Member</h2>
    <p>Join Vivid Horizons Art Gallery to stay updated and gain exclusive access to exhibitions and events.</p>

    <?php if (!empty($message)): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" id="membership-form" novalidate>
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="membership_type">Membership Type:</label>
        <select id="membership_type" name="membership_type" required>
            <option value="">Select Membership</option>
            <option value="basic">Monthly / $300</option>
            <option value="premium">Yearly / $1500</option>
            <option value="lifetime">Lifetime / $5000</option>
        </select>

        <label for="message">Why do you want to join? (Optional)</label>
        <textarea id="message" name="message" rows="4"></textarea>

        <button type="submit">Apply for Membership</button>
    </form>
</div>

<footer>
    <?php include "footer.php"; ?>            
</footer>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>            
<script src="js/easing.min.js"></script>            
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>    
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>    
<script src="js/owl.carousel.min.js"></script>    
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/justified.min.js"></script>                    
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>            
<script src="js/parallax.min.js"></script>        
<script src="js/mail-script.js"></script>    
<script src="js/main.js"></script>    

<script>
    // Form validation
    document.getElementById("membership-form").addEventListener("submit", function (event) {
        if (!this.checkValidity()) {
            event.preventDefault(); // Stop form submission
            alert("Please fill all required fields.");
        }
    });
</script>

</body>
</html>
