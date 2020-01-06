<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style type="text/css">
			.error {color: #FF0000;}
		</style>
	<?php 
		$name = $address = $contact = $gender = $email = $topic = $source = $description = "";
				$nameErr = $addressErr = $contactErr = $topicErr = $genderErr = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$name = test_input($_POST["name"]);
					$address = test_input($_POST["Address"]);
					$contact = test_input($_POST["Contact"]);	
					$gender = test_input($_POST["gender"]);	
					$email = test_input($_POST["Email"]);	
					$topic = test_input($_POST["select"]);
					// $source = test_input($_POST["checkbox"]);
					$description = test_input($_POST["Description"]);
				}

				function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
						}
						// check the input
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (empty($_POST["name"])) {
					    $nameErr = "User Name is required";
					 } else {
					    $name = test_input($_POST["name"]);
					      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     					 $nameErr = "Please enter valid name"; 
   						 }
					 }

					if (empty($_POST["Address"])) {
					    $addressErr = "Address is required";
					  } else {
					    $address = test_input($_POST["Address"]);
					  }

					if (empty($_POST["Contact"])) {
					    $contactErr = "Contact is required";
					  } else {
					    $contact = test_input($_POST["Contact"]);
					  }

					if (empty($_POST["select"])) {
					    $topicErr = "Topic is required";
					  } else {
					    $topic = test_input($_POST["select"]);
					  }
					  // if (empty($_POST["gender"])) {
					  //   $genderErr = "Gender is required";
					  // } else {
					  //   $topic = test_input($_POST["gender"]);
					  // }

					 // 	echo "<h2>Your Input:</h2>";
						// echo $name;echo "<br>"; 
						// echo $topic;echo "<br>"; 
						// echo $contact;echo "<br>"; 
						// echo $email;echo "<br>";
						// echo $source;echo "<br>";
						// echo $gender;echo "<br>";
						// echo $address;echo "<br>";
						// echo $description;
						
					 }
	?>
</head>
<body >
<!-- Header -->
			<header id="header">
				<a class="logo" href="office system.html">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<!-- <div id="heading" >
				<h1>Inquery Form</h1>
			</div> -->

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Acet Shop</a></li>
					<li><a href="#">Acet Courses</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="logOut.php">Log Out</a></li>
					<li><a href="formvalid.php">About Us</a></li>
					<li><a href="elements.php">Elements</a></li>
				</ul>
			</nav>
			<header id="header">
				<a class="logo" href="office system.html">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

			<!-- main -->
	<section id="main" class="wrapper">
		<h3><b>All the fields are required</b></h3><br>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<label>Full Name :</label>
					<input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Person Name" /><span class="error"> <?php echo $nameErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>Address :</label>
					<input type="text" name="Address" id="Address" value="<?php echo $address;?>" placeholder="Address" /><span class="error"> <?php echo $addressErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>Contact :</label>
					<input type="text" name="Contact" id="Contact" value="<?php echo $contact;?>" placeholder="Contact" /><span class="error"> <?php echo $contactErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>Email :</label>
					<input type="email" name="Email" id="Email" value="<?php echo $email;?>" placeholder="Email" /><span class="error">
				</div>
				<!-- gender -->
				<div class="col-12 col-12-small">					
					<label for="gender">Gender :</label>
				</div>
				<!-- radio -->
					<div class="col-4 col-12-small">
						<input type="radio" id="radio-alpha" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
						<label for="radio-alpha">Male</label>
					</div>
					<div class="col-4 col-12-small">
						<input type="radio" id="radio-beta" name="gender"<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
						<label for="radio-beta">Female</label>
					</div>
					<div class="col-4 col-12-small">
						<input type="radio" id="radio-gamma" name="gender"<?php if (isset($gender) && $gender=="others") echo "checked";?> value="others">
						<label for="radio-gamma">Others</label>
					</div>

				<div class="col-12 col-12-small">					
				<label for="Source">Source :</label>
				</div>
					<div class="col-6 col-12-small">
						<input type="checkbox" id="checkbox-alpha" name="checkbox"<?php if (isset($checkbox) && $checkbox=="Canopy") echo "checked";?> value="Canopy">
						<label for="checkbox-alpha">Canopy</label>
					</div>
					<div class="col-6 col-12-small">
						<input type="checkbox" id="checkbox-beta" name="checkbox"<?php if (isset($checkbox) && $checkbox=="Facebook") echo "checked";?> value="Facebook">
						<label for="checkbox-beta">Facebook</label>
					</div>
					<div class="col-6 col-12-small">
						<input type="checkbox" id="checkbox-gama" name="checkbox"<?php if (isset($checkbox) && $checkbox=="Google Search") echo "checked";?> value="Google Search">
						<label for="checkbox-gama">Google Search</label>
					</div>
					<div class="col-6 col-12-small">
						<input type="checkbox" id="checkbox-delta" name="checkbox"<?php if (isset($checkbox) && $checkbox=="Friends") echo "checked";?> value="From Friends">
						<label for="checkbox-delta">From Friends</label>
					</div>
				<!-- break -->
				<div class="col-12">
					<label>Topic :</label>

					<select name="select" id="category">
						<option value="">- Select -</option>
						<option value="basic_software1">Basic Course (1 month software)</option>
						<option value="basic_software3">Basic Course (3 month software)</option>
						<option value="basic_hardware1">Basic Course (1 month hardware)</option>
						<option value="basic_hardware3">Basic Course (3 month hardware)</option>
						<option value="chip_level">Chip level (14 month hardware)</option>
						<option value="job_guaranty">job guaranty (6 month hardware)</option>
						<option value="job_vaccancy">job Vaccancy</option>
						<option value="buy_laptop">Buy new laptop</option>
						<option value="buy_desktop">Buy new Desktop</option>
					</select>
					<span class="error"> <?php echo $topicErr;?></span>
				</div>
				<!-- Break -->
				<div class="col-12">
					<label>Description :</label>
					<textarea name="Description" id="textarea" placeholder="Alpha beta gamma delta" rows="6"></textarea>
				</div>
				<!-- Break -->
				<div class="col-12">
					<ul class="actions">
						<li><input type="submit" value="Submit " class="primary" /></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</div>
			</div>
		</form>
</section>
<!-- <script type="text/javascript">
		d= new Date();
		h=d.getHours();
		m=d.getMinutes();
		date=
		document.getElementById("date").innerHTML= (d.getDate()+"/"+ d.getMonth()+"/"+ d.getFullYear());
	</script> -->
	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>