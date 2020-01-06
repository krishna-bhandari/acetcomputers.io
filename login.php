<!DOCTYPE html>
<html>
<head>
	<title>log in</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<style type="text/css">
		/* Center the image and position the close button */
		.imgcontainer {  text-align: center;  margin: 24px 0 12px 0;  position: relative;}
		img.avatar {  width: 30%;  border-radius: 50%;}
		.container {  padding: 16px;}
		span.psw {  float: right;  padding-top: 26px;}
		label{
			float: left;}
			}
			form{
				background-color: white;
				border-radius: 5px;
			}	
		.error {color: #FF0000;}

			}
	</style>
	<?php
						// define variables and set to empty values
				$name = $password = "";
				$nameErr = $passwordErr = $loginErr = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$name = test_input($_POST["name"]);
					$password = test_input($_POST["password"]);
					
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
					 }

					if (empty($_POST["password"])) {
					    $passwordErr = "Password is required";
					  } else {
					    $password = test_input($_POST["password"]);
					  }
						if ($name=="krishna" && $password=="12345") {
							header("Location:office system.html");
					
						}
						else{
						$loginErr="user name or password is invalid";
						}
				}
	?>
</head>

<body class="is-preload">
	<header id="header">
		<a class="logo" href="index.html">A-CET Computers</a>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
	</header>
		<nav id="menu">
			<ul class="links">
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Acet Shop</a></li>
				<li><a href="#">Acet Courses</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="login.php" class="active">Log In</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="elements.php">Elements</a></li>
			</ul>
		</nav>
	<section class="wrapper">
	<h2>Log In</h2>

		<div class="inner">
			<!-- <div class="highlights"> -->
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				    <div class="imgcontainer">
				      <img src="images/capture.png" alt="Avatar" class="avatar">
				    </div>

				    <div class="container">
				    	<!-- user name input -->
				      <label for="uname"><b>Username</b></label>
				      <input type="text" placeholder="Enter Username" name="name" id="name" value=""><br>
				      <span class="error"> <?php echo $nameErr;?></span>
				<br><br>
				      	<!-- password input -->
				      <label for="psw"><b>Password</b></label>
				      <input type="password" placeholder="Enter Password" name="password" id="password" ><br>
				      <span class="error"><?php echo $passwordErr;?></span>
				<br><br>
				      <!-- show password -->
				      <br>
					<div class="col-6 col-12-small">
						<input type="checkbox" id="checkbox-alpha" name="checkbox" onclick="showPass()">
						<label for="checkbox-alpha">Show Password</label>
					</div>

				    </div>
				    <div class="col-6 col-12-small">
						<span class="error"><?php echo $loginErr;?></span>

					</div>
				    <div class="container" style="background-color:#f1f1f1">
				      <span class="psw">Forgot <a href="#">password?</a></span>
				    </div>
				    <div class="col-12">
								<ul class="actions">
									<li><input type="submit" value="Log In" class="primary" /></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
					</div>
			</form>
		</div>
	</section>

	<script type="text/javascript">
		function login(){
			name =document.getElementById("name").value
			pass=document.getElementById("Password").value
			alert(name+pass)
			if (name=="krishna" && pass==123456) {
			window.open("office system.html")
			}
			else{
				alert("login failed")
			}
		}
		function showPass() {
		  var x = document.getElementById("password");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		}
	</script>
	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>

