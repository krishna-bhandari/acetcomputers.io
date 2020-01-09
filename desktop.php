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
$customer_nameErr = $addressErr = $contactErr = $deviceErr = $statusErr = "";
$customer_name = $address = $contact = $status = $solution = $technician = $device = $device_detail = $entry_number = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $entry_number=test_input($_POST["entry_number"]);
    $date=test_input($_POST["date"]);
    $device_detail=test_input($_POST["device_detail"]);
    $solution=test_input($_POST["solution"]);
    $technician=test_input($_POST["technician"]);

  if (empty($_POST["name"])) {
   
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["customer_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$customer_name)) {
      $customer_nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else{
    $address = test_input($_POST["address"]);

  }
    
  if (empty($_POST["contact"])) {
    $contactErr = "Contact is required";
  } else {
    $contact = test_input($_POST["contact"]);

  if (empty($_POST["device"])) {
    $deviceErr = "device is required";
  } else {
    $device = test_input($_POST["device"]);
  }

  if (empty($_POST["status"])) {
    $statusErr = "status is required";
  } else {
    $status = test_input($_POST["status"]);
  }
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
      <div id="heading" >
        <h1>Desktop entry</h1>
      </div>
<!-- <h2>PHP Form Validation Example</h2> -->
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<div class="row gtr-uniform">
    <div class="col-6 col-12-xsmall">
        <label for="entry number"><b>Entry Number</b></label>
        <input type="text" placeholder="" name="entry_number" id="entry_number" value="" readonly=""><br>
    </div>
      <div class="col-6 col-12-xsmall">
        <label for="Date"><b>Date :</b></label>
        <input type="text" placeholder="" name="date" id="date" value="<?php
              echo date("d/M/Y").date("D");?>" readonly=""><br>
    </div>
		    	<!-- customer name input -->
		<div class="col-6 col-12-xsmall">
	      <label for="customer_name"><b>Customer Name</b></label>
	      <input type="text" placeholder="Enter Customer Name" name="customer_name" id="name" value=""><br>
	      <span class="error"> *<?php echo $customer_nameErr;?></span>
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
		      <label for="device"><b>Device :</b></label>
		     	<select name="device" id="category">
						<option value="">- Select -</option>
						<option value="Motherboard">Motherboard</option>
						<option value="Full CPU">Full CPU</option>
						<option value="Monitor">Monitor</option>
						<option value="Others">Others</option>
					</select>
					<span class="error"> <?php echo $deviceErr;?></span>
		<br><br>	</div>
		<!-- device detail -->
		<div class="col-12 col-12-xsmall">
		      <label for="device detail"><b>Device detail</b></label>
		      <input type="text" placeholder="Enter device detail" name="device_detail" id="device_detail" value=""><br></div>
		<br><br>
		      	<!-- technician input -->
		      	<div class="col-6 col-12-xsmall">
		      <label for="technician"><b>Technician</b></label>
		      <input type="text" placeholder="Enter technician name" name="technician" id="technician" ><br>
    </div>
        <div class="col-6 col-12-xsmall">
          <label for="solution"><b>Solution</b></label>
          <input type="text" placeholder="Solution" name="solution" id="solution" ><br>
    </div>    
    <div class="col-12 col-12-xsmall">
          <label for="status"><b>Status</b></label>
          <select>
            <option value="New Arrived">New Arrived</option>
            <option value="Waiting">Waiting</option>
            <option value="Return">Return</option>
            <option value="Completed">Completed</option>
            <option value="Dispatched">Dispatched</option>
          </select>
          <span class="error">*<?php echo $statusErr;?></span></div>
    </div>
    <div class="col-12 col-12-xsmall">

  <input type="submit" name="submit" value="Submit">  
  <input type="reset" name="reset" value="Reset">
</div>
</form>
</body>
</html> 