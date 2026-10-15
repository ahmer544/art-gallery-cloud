<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
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
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

		<header>
		<?php include "navbar.php" ; ?>	
</header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us
							</h1>	
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			<?php
// Database connection
require_once __DIR__ . '/db.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle form submission
    $message = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $messageContent = htmlspecialchars($_POST['message']);

        // Insert query into the database
        $stmt = $pdo->prepare("INSERT INTO contact_queries (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $messageContent);
        $stmt->execute();

        $message = "Thank you! Your message has been sent.";
    }
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>


  <!-- Start contact-page Area -->
  <section class="contact-page-area section-gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-flex flex-column address-wrap">
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-home"></span>
            </div>
            <div class="contact-details">
              <h5>Mirpur, AJK</h5>
              <p>MUST, Allama Iqbal Road</p>
            </div>
          </div>
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-phone-handset"></span>
            </div>
            <div class="contact-details">
              <h5>+93 320 5726 544</h5>
              <p>Mon to Fri 9am to 6 pm</p>
            </div>
          </div>
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-envelope"></span>
            </div>
            <div class="contact-details">
              <h5>supportvividhorizons@gmail.com</h5>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <form class="form-area" method="POST" action="" class="contact-form text-right">
            <div class="row">
              <div class="col-lg-6 form-group">
                <input name="name" placeholder="Enter your name" class="common-input mb-20 form-control" required="" type="text">
                <input name="email" placeholder="Enter email address" class="common-input mb-20 form-control" required="" type="email">
                <input name="subject" placeholder="Enter your subject" class="common-input mb-20 form-control" required="" type="text">
              </div>
              <div class="col-lg-6 form-group">
                <textarea class="common-textarea form-control" name="message" placeholder="Message" required=""></textarea>
                <button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
              </div>
            </div>
          </form>
          <?php if (!empty($message)): ?>
            <p style="color: green; text-align: center; margin-top: 10px;"><?php echo $message; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End contact-page Area -->



			<footer>
			<?php include "footer.php" ; ?>			
			</footer>		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
		</body>
	</html>



