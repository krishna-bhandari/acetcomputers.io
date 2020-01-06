<!DOCTYPE HTML>  
<html>
<head>
			<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<div class="row gtr-uniform">
		    	<!-- customer name input -->
		<div class="col-6 col-12-xsmall">
	      <label for="customer_name"><b>Customer Name</b></label>
	      <input type="text" placeholder="Enter Customer Name" name="customer_name" id="name" value=""><br>
	      <span class="error"> *<?php echo $nameErr;?></span>
		</div>
		<br><br>
		      	<!-- contact input -->
		<div class="col-6 col-12-xsmall">
	      <label for="contact"><b>Contact</b></label>
	      <input type="text" placeholder="Enter Contact" name="contact" id="contact" ><br>
	      <span class="error">*<?php echo $contactErr;?></span>
		</div>
		<br><br>
		<!-- address input-->
		    	<div class="col-6 col-12-xsmall">
		      <label for="address"><b>Address</b></label>
		      <input type="text" placeholder="Enter address" name="address" id="address" value=""><br>
		      <span class="error"> *<?php echo $addressErr;?></span></div>
		<br><br>
		      	<!-- device selection -->
		      	<div class="col-6 col-12-xsmall">
		      <label for="psw"><b>Device :</b></label>
		     	<select name="select" id="category">
						<option value="">- Select -</option>
						<option value="">Motherboard</option>
						<option value="">Full CPU</option>
						<option value="">Monitor</option>
						<option value=""></option>
					</select>
					<span class="error"> <?php echo $deviceErr;?></span>
		<br><br>	
		<!-- device detail -->
		<div class="col-12 col-12-xsmall">
		      <label for="device detail"><b>Device detail</b></label>
		      <input type="text" placeholder="Enter device detail" name="device_detail" id="device_detail" value=""><br>
		      <span class="error"> *<?php echo $nameErr;?></span></div>
		<br><br>
		      	<!-- password input -->
		      	<div class="col-6 col-12-xsmall">
		      <label for="psw"><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="password" id="password" ><br>
		      <span class="error">*<?php echo $passwordErr;?></span></div>
		<br><br>
    </div>
</form>


 <!--  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?> -->

</body>
</html>
 