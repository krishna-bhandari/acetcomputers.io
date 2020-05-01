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

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
		<style type="text/css">
			.error {color: #FF0000;}
		</style>
	<?php 
		$name = $address = $contact = $gender = $id = $position =$u_name=$pass=$c_pass= "";
		$nameErr = $addressErr = $contactErr = $idErr =$passErr= $u_nameErr="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$name = test_input($_POST["name"])	;
			$address = test_input($_POST["Address"])	;
			$contact =test_input($_POST["Contact"]) 	;	
			$gender = test_input($_POST["gender"])	;	  
			$email =test_input($_POST["id"]) ;	
			$u_name = test_input($_POST["u_name"]);
			$pass=test_input($_POST["pass"]);
			$c_pass=test_input($_POST["c_pass"]);
			$position=test_input($_POST["position"]);
			$id=test_input($_POST["id"]);
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
			    $name =test_input($_POST["name"]);
			      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					 $nameErr = "Please enter valid name"; 
					 }
			 }
			if (empty($_POST["Address"])) {
			    $addressErr = "Address is required";
			  } else {
			    $address =test_input($_POST["Address"]) ;
			  }

			if (empty($_POST["Contact"])) {
			    $contactErr = "Contact is required";
			  } else {
			    $contact = test_input($_POST["Contact"]);
			  }
			  if (empty($_POST["pass"])) {
			  	$passErr="password can not be empty";
			  }
			  else{
			  	 if (!$pass==$c_pass) {
			 		$passErr="password not matched";
			 		}else{
			 		$pass=test_input($_POST["pass"])  ;
			 			}
				}			
			$link = mysqli_connect("localhost", "root", "", "acet_db");
			 
			// Check connection
			if($link === false){
			    die("ERROR: Could not connect. " . mysqli_connect_error());
			}


			$sql = "INSERT INTO users (id,user_name,password,f_name,gender,address,contact,post,u_id) VALUES ('','$u_name','$pass','$name','$gender','$address','$contact','$position','$id')";
			$sql1 = "INSERT INTO login (user_name, password, post) VALUES ('$u_name','$pass','$position')";
			mysqli_query($link, $sql1);
			if(mysqli_query($link, $sql)){

			   header("Location: index.php?sign up successfull.");

			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			 

			}
			 
			// Close connection
			mysqli_close($link);
		}
	?>
</head>
<body >
<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<div id="heading" >
				<h1>Register Now</h1>
			</div>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="office_system.php">Home</a></li>
					<li><a href="#">Acet Shop</a></li>
					<li><a href="#">Acet Courses</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
					<li><a href="logOut.php">Log Out</a></li>
					<li><a href="elements.php">Elements</a></li>
				</ul>
			</nav>

			<!-- main -->
	<section id="main" class="wrapper">
		<h3><b>All the fields are required</b></h3><br>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<label>Full Name :</label>
					<input type="text" name="name" id="name" value="" placeholder="Person Name" /><span class="error"> <?php echo $nameErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>Address :</label>
					<input type="text" name="Address" id="Address" value="" placeholder="Address" /><span class="error"> <?php echo $addressErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>Contact :</label>
					<input type="text" name="Contact" id="Contact" value="" placeholder="Contact" /><span class="error"> <?php echo $contactErr;?></span>
				</div>
				<div class="col-6 col-12-xsmall">
					<label>ID :</label>
					<input type="text" name="id" id="id" value="" placeholder="Technician ID" /><span class="error">
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
				<!-- Break -->
				<div class="col-6 col-12-xsmall">
					<label>User Name</label>
					<input type="text" name="u_name" id="u_name" value="" placeholder="User Name" />
				</div>
				 <div class="col-6 col-12-xsmall">
		      <label for="post"><b>Position :</b></label>
		     	<select name="position" id="category">
						<option value="">- Select -</option>
						<option value="Reception">Reception</option>
						<option value="Technician">Technician</option>
						<option value="user">User</option>
						<!-- <option value="Others">Others</option> -->
					</select>
				
		<br><br>	</div>


				<div class="col-12 col-12-xsmall">
					<label>Password</label>
					<input type="password" name="pass" id="pass" placeholder="Enter password" />
				<span class="error"> <?php echo $passErr;?></span>
				</div><div class="col-12 col-12-xsmall">
					<label>Confirm Password</label>
					<input type="password" name="c_pass" id="c_pass" placeholder="Confirm Password" onkeyup="check_pass()" />
					<span class="error" id="passErr"><!--  <?php echo $passErr;?> --></span>
				</div>
				<script type="text/javascript">
					function check_pass(){
						pass=document.getElementById("pass").value;
						c_pass=document.getElementById("c_pass").value;
						if (pass==c_pass) {
							  document.getElementById("passErr").innerHTML ="";
						}
						else{
							 document.getElementById("passErr").innerHTML ="The password did not match";
						}
					}
				</script>
				<!-- Break -->
				<div class="col-12">
					<ul class="actions ">
						<li><input type="submit" value="Submit " class="primary" /></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</div>
			</div>
		</form>
</section>
<script type="text/javascript">
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