<!DOCTYPE HTML>
<?php
session_start();
 ?>


<html>
	<head>
		<title>A-CET</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	</head>
	<body class="is-preload" onload="">
		<!-- login script -->
		<?php  

if($_SESSION["user"]){
	
?>
		<!-- Header -->
			<header id="header">
				<a class="logo" href="office system.php">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<div id="heading" >
				<h1>Office system</h1>
			</div>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="acet shop.php">Acet Shop</a></li>
					<li><a href="#">Acet Courses</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
					<li><a href="logOut.php">Log Out</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="elements.php">Elements</a></li>
				</ul>
			</nav>

			<section class="wrapper">
				<div class="inner">
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a href="desktop.php" class="icon fa-desktop"><span class="label">Icon</span>
									<h3>desktop entry</h3></a>
								</header>
							
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="laptop.php" class="icon fa-laptop"><span class="label">Icon</span>
									<h3>laptop entry</h3></a>
								</header>
							
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="fieldEntry.php" class="icon fa-book"><span class="label">Icon</span>
									<h3>field entry</h3></a>
								</header>
							
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="entryBook.php" class="icon fa-file"><span class="label">Icon</span>
									<h3>entry book</h3></a>
								</header>
							
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="InqueryForm.php" class="icon fa-pencil"><span class="label">Icon</span></a>
									<h3>inquires</h3>
								</header>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="dataRecovery.php" class="icon fa-database"><span class="label">Icon</span>
									<h3>Data Recovery</h3></a>
								</header>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="technician.php" class="icon fa-users"><span class="label">Icon</span>
									<h3> Our Technicians</h3></a>
								</header>
							</div>
						</section><!-- <section>
							<div class="content">
								<header>
									<a href="dataRecovery.php" class="icon fa-database"><span class="label">Icon</span>
									<h3>Data Recovery</h3></a>
								</header>
							</div>
						</section> -->
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
				<!-- 
						<section>
							<h4>Like Us On :</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a>
								</li><li>
								<a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								
							</ul>
						</section> -->

					</div>
				</div>
				<div class="copyright">
						<h2 style="margin-bottom: 0">"our work is our identity"</h2>
					</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<?php
}
else{
	echo "please log in";
}
?>
	</body>
</html>