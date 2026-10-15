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
      <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Artists Section */
    .artists-section {
      padding: 120px;
      background-color: #f9f9f9;
      text-align: center;
    }

    .artists-section h2 {
      font-size: 40px;
      margin-bottom: 120px;
      color: #333;
    }

    .artists-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .artist-card {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 200px;
      padding: 10px;
      text-align: center;
    }

    .artist-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    .artist-card h3 {
      font-size: 18px;
      margin: 10px 0 5px;
      color: #333;
    }

    .artist-card p {
      font-size: 14px;
      color: #666;
    }
  </style>
</head>



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
								Art Gallery				
							</h1>	
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery.php"> Gallery</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	


			<?php include "section4.php" ; ?>


<!-- Artists Section -->
<section class="artists-section">
    <h2>Popular Artists</h2>
    <div class="artists-container">
      <!-- Artist 1 -->
      <div class="artist-card">
        <img src="img/artists/1.png" alt="Artist 1">
        <h3>Emily Carter</h3>
        <p>Master of abstract landscapes.</p>
      </div>
      <!-- Artist 2 -->
      <div class="artist-card">
        <img src="img/artists/2.png" alt="Artist 2">
        <h3>Liam Smith</h3>
        <p>Renowned for vibrant portraits.</p>
      </div>
      <!-- Artist 3 -->
      <div class="artist-card">
        <img src="img/artists/3.png" alt="Artist 3">
        <h3>Amara Singh</h3>
        <p>Explores cultural symbolism.</p>
      </div>
      <!-- Artist 4 -->
      <div class="artist-card">
        <img src="img/artists/4.png" alt="Artist 4">
        <h3>David Lee</h3>
        <p>Specializes in surrealism.</p>
      </div>
      <!-- Artist 5 -->
      <div class="artist-card">
        <img src="img/artists/5.png" alt="Artist 5">
        <h3>Isabella Moretti</h3>
        <p>Known for expressive graffiti.</p>
      </div>
    </div>
  </section>

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



