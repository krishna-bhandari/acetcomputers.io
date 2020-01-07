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
    
  // if (empty($_POST["website"])) {
  //   $website = "";
  // } else {
  //   $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
  //   if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  //     $websiteErr = "Invalid URL"; 
  //   }
  // }

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

</head>
<body>  
<header id="header">
    <a class="logo" href="index.php">A-CET Computers</a>
    <nav>
      <a href="#menu">Menu</a>
    </nav>
  </header>
    <nav id="menu">
      <ul class="links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Acet Shop</a></li>
        <li><a href="#">Acet Courses</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="login.php" class="active">Log In</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="elements.php">Elements</a></li>
      </ul>
    </nav>

<!-- <h2>PHP Form Validation Example</h2> -->
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<div class="row gtr-uniform">
    <div class="col-6 col-12-xsmall">
        <label for="entry number"><b>Entry Number</b></label>
        <input type="text" placeholder="" name="customer_name" id="entry_number" value="" readonly=""><br>
        <!-- <span class="error"> *<?php echo $nameErr;?></span> -->
    </div>
      <div class="col-6 col-12-xsmall">
        <label for="Date"><b>Date :</b></label>
        <input type="text" placeholder="" name="date" id="date" value="<?php
echo date("d/M/Y") ;?>" readonly=""><br>
        <!-- <span class="error"> *<?php echo $nameErr;?></span> -->
    </div>
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
						<option value="">Others</option>
					</select>
					<span class="error"> <?php echo $deviceErr;?></span>
		<br><br>	
		<!-- device detail -->
		<div class="col-12 col-12-xsmall">
		      <label for="device detail"><b>Device detail</b></label>
		      <input type="text" placeholder="Enter device detail" name="device_detail" id="device_detail" value=""><br>
		      <!-- <span class="error"> *<?php echo $Err;?></span></div> -->
		<br><br>
		      	<!-- password input -->
		      	<div class="col-6 col-12-xsmall">
		      <label for="technician"><b>Technician</b></label>
		      <input type="text" placeholder="Enter technician name" name="technician" id="technician" ><br>
		      <!-- <span class="error">*<?php echo $passwordErr;?></span></div> -->
    </div>
        <div class="col-6 col-12-xsmall">
          <label for="solution"><b>Solution</b></label>
          <input type="text" placeholder="Solution" name="solution" id="solution" ><br>
          <!-- <span class="error">*<?php echo $passwordErr;?></span></div> -->
    </div>    <div class="col-6 col-12-xsmall">
          <label for="status"><b>Status</b></label>
          <select>
            <option value="New Arrived">New Arrived</option>
            <option value="Waiting">Waiting</option>
            <option value="Return">Return</option>
            <option value="Completed">Completed</option>
            <option value="Dispatched">Dispatched</option>
          </select>
          <!-- <input type="text" placeholder="" name="technician" id="technician" ><br> -->
          <!-- <span class="error">*<?php echo $passwordErr;?></span></div> -->
    </div>
  <input type="submit" name="submit" value="Submit">  
  <input type="reset" name="reset" value="Reset">

</form>



</body>
</html>
 