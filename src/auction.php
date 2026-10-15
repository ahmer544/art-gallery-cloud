<?php
// Start the session to access session variables
session_start();

// Database connection
require_once __DIR__ . '/db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch auction items from the database
$sql = "SELECT * FROM auction_items WHERE end_time > NOW() ORDER BY end_time ASC";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
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
.success-message {
    color: #88d200; /* Blue text color */
    text-align: center; /* Center the text */
    font-size: 25px; /* Font size for readability */
    margin-top: 20px;
    padding-bottom: 35px; /* Space above the message */
}

/* General Section Styles */
.section-gap {
    padding: 80px 0; /* Add padding to top and bottom */
    background-color: #f9f9f9; /* Light background color */
}

.container {
    max-width: 1200px;
    margin: 0 auto; /* Center the container */
}

.row {
    margin: 0 -15px; /* Align the row elements properly */
}

/* Title Section */
.title {
    margin-bottom: 40px;
}

.title h1 {
    font-size: 36px;
    color: #333; /* Dark color for the heading */
    font-weight: bold;
}

.title p {
    font-size: 18px;
    color: #777; /* Lighter color for description */
}

/* Single Auction Item */
.single-auction {
    background-color: #fff;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

.single-auction:hover {
    transform: translateY(-10px); /* Lift effect on hover */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
}

/* Image */
.single-auction img {
    width: 100%;
    height: auto;
    border-radius: 8px; /* Rounded corners for images */
    object-fit: cover;
    margin-bottom: 20px;
}

/* Title and Artist */
.single-auction h4 {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.single-auction p {
    font-size: 16px;
    color: #555; /* Lighter color for text */
    margin-bottom: 20px;
}

/* Bid Form */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px; /* Space between form elements */
}

form input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
}

form button[type="submit"] {
    padding: 12px 20px;
    background-color: #88d200; /* Blue button */
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button[type="submit"]:hover {
    background-color:rgb(108, 163, 6); /* Darker blue on hover */
}

/* Auction Time */
.auction-time {
    font-size: 14px;
    color: #999;
    margin-top: 15px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .single-auction {
        margin-bottom: 30px; /* More space between items on small screens */
    }

    .single-auction h4 {
        font-size: 18px;
    }

    .single-auction p {
        font-size: 14px;
    }

    form input[type="number"],
    form button[type="submit"] {
        width: 80%; /* Make form elements smaller on mobile */
    }
}

@media (max-width: 480px) {
    .title h1 {
        font-size: 28px;
    }

    .single-auction h4 {
        font-size: 16px;
    }

    .single-auction p {
        font-size: 12px;
    }
}


</style>
</head>

<body>
    <!-- Header Section -->
    <header>
		<?php include "navbar.php" ; ?>	
</header>
    <!-- End Header -->

	<!-- start banner Area -->
    <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Auction				
							</h1>	
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="auction.php"> Auction</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->


  <!-- Auction Section -->
  <section class="section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                    <?php
    // Display success message if bid was placed
if (isset($_SESSION['bid_success'])) {
    echo "<div class='success-message'>" . $_SESSION['bid_success'] . "</div>";
    
    // Unset the session variable to avoid displaying the message again
    unset($_SESSION['bid_success']);
}
?>
                        <h1 class="mb-10">Ongoing Auctions</h1>
                        <p>Place your bids on these exclusive art pieces</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-auction">
                                <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                <h4><?php echo $row['title']; ?> by <?php echo $row['artist']; ?></h4>
                                <p>Starting Bid: $<?php echo $row['start_price']; ?></p>
                            <!-- Inside Auction Item Loop -->
                        <form method="POST" action="bid.php"> <!-- Place this code in the appropriate PHP page -->
                            <input type="hidden" name="artwork_id" value="<?php echo $row['id']; ?>"> <!-- Artwork ID -->
                            <label for="bid_amount">Place your bid:</label>
                            <input type="number" name="bid_amount" id="bid_amount" min="0" step="any" required>
                            <button type="submit" name="place_bid">Place Bid</button>
                        </form>

                                <p class="auction-time">Ends on: <?php echo date('F j, Y, g:i a', strtotime($row['end_time'])); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">No ongoing auctions at the moment. Please check back later!</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Auction Section End -->

	<footer>
			<?php include "footer.php" ; ?>			
			</footer>
    <!-- End Footer Section -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
