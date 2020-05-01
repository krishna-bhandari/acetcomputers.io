 <?php include 'includes/db_connection.php'; ?>
<?php

  if(isset($_GET["id"])){
    $param_id = trim($_GET["id"]);
    $connection=mysqli_connect('localhost','root','','acet_db');
    $sql = "SELECT * FROM entry_book WHERE id = '$param_id'";
    $result = $connection -> query($sql);
    if ($result -> num_rows > 0) 
    {
      echo "connected";
      while ($row = $result -> fetch_assoc()) 
      {
        $device = $row['d_name'];
        $entry_number=$row['entry_no'];
        $dates=$row['dates'];
        $device_detail=$row['d_detail'];
        $solution=$row['solution'];
        $technician=$row['tech_name']; 
        $problem=$row['problem'];
        $type=$row['type'];
        $customer_name =$row['c_name'];
        $address = $row['c_address'];
        $status = $row['status'];
        $contact = $row['c_contact'];
      }  
    } else
    {
      // URL doesn't contain valid id parameter. Redirect to error page
      header("location: error.php");
      exit();
    }
  } else{
      // URL doesn't contain id parameter. Redirect to error page
      header("location: error.php");
      exit();
    }
?>


<!DOCTYPE HTML> 
<?php
session_start();
 ?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
	<link rel="stylesheet" href="assets/css/main.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body> 
  <?php    if(isset($_SESSION["user"])){  ?> 
  <header id="header">
    <a class="logo" href="office-system.php">A-CET Computers</a>
    <nav>
      <a href="#menu">Menu</a>
    </nav>
  </header>
  <nav id="menu">
    <ul class="links">
      <li><a href="office_system.php" class="active">Home</a></li>
      <li><a href="#">Acet Shop</a></li>
      <li><a href="#">Acet Courses</a></li>
      <li><a href="contactUs.php">Contact Us</a></li>
      <li><a href="login.php" >Log In</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="elements.php">Elements</a></li>
    </ul>
  </nav>
  <div id="heading" >
    <h1>Update Entry</h1>
  </div>
  <section id="main" class="wrapper">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" name="device_entry_form" 
    onsubmit="return validate()"  >
      <div class="row gtr-uniform">
        <div class="col-12 col-12-xsmall">
          <label for="type"><b>Type</b></label>
          <select name="type" id="type"  >
            <option value="<?php echo $type;   ?>">
              <?php echo $type;   ?>
            </option>
            
          </select>
          <span class="error"> </span>
          <br><br>  
        </div>
        <div class="col-6 col-12-xsmall">
          <label for="entry number"><b>Entry Number</b></label>
          <input type="text" placeholder="" name="entry_number" id="entry_number" value="<?php echo $entry_number;   ?>" readonly>
          <span class="error" id="entry_number_error"> </span>
           
         <br>
        </div>
        <div class="col-6 col-12-xsmall">
          <label for="Date"><b>Date :</b></label>
          <input type="text" placeholder="" name="dates" id="dates"value="<?php echo $dates; ?>" readonly><br>
        </div>
        <!-- customer name input -->
    		<div class="col-6 col-12-xsmall">
  	      <label for="customer_name"><b>Customer Name</b></label>
  	      <input type="text" placeholder="Enter Customer Name" name="customer_name" id="c_name" value="<?php echo $customer_name; ?>" ><br>
  	      <span class="error" id="c_name_error"> </span>
    		</div>
    		<br><br>
    		      	<!-- contact input -->
    		<div class="col-6 col-12-xsmall">
  	      <label for="contact"><b>Contact</b></label>
  	      <input type="text" placeholder="Enter Contact" name="contact" id="contact" onmouseout ="check1()" value="<?php echo $contact;   ?>"><br>
  	      <span class="error" id="contact_error"></span>
    		</div>
    		<br><br>
    		<!-- address input-->
	    	<div class="col-6 col-12-xsmall">
  	      <label for="address"><b>Address</b></label>
  	      <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $address;   ?>"onmouseout ="check1()"><br>
  	      <span class="error" id="address_error"> </span>
        </div>
       	<br><br>
        <!-- device selection -->
        <div class="col-6 col-12-xsmall"id="category_laptop" style="display:none;">
          <label for="device"><b>Device :</b></label>
          <select name="device" >
            <option value="">value="<?php echo $device;   ?>"</option>
          <!--   <option value="HP">HP</option>
            <option value="Dell">Dell</option>
            <option value="Acer">Acer</option>
            <option value="Toshiba">Toshiba</option>
            <option value="Asus">Asus</option>
            <option value="Lenovo">Lenovo</option>
            <option value="Fujitsu">Fujitsu</option>
            <option value="Compaq">Compaq</option>
            <option value="Mac">Mac</option>
            <option value="emachine">emachine</option>
            <option value="Wipro">Wipro</option>
            <option value="Others">Others</option> -->
          </select>
        </div>
		    <!-- <div class="col-6 col-12-xsmall" id="category_desktop">
		      <label for="device1"><b>Device :</b></label>
		     	<select name="device1"  >
						<option value="">- Select -</option>
						<option value="Motherboard">Motherboard</option>
						<option value="Full CPU">Full CPU</option>
						<option value="Monitor">Monitor</option>
						<option value="Others">Others</option>
					</select>
        </div>

        
        <div class="col-6 col-12-xsmall"id="category_recovery"style="display:none;">
          <label for="device2"><b>Device :</b></label>
          <select name="device2" >
            <option value="">- Select -</option>
            <option value="Laptop HDD">Laptop HDD</option>
            <option value="Desktop HDD">Desktop HDD</option>
            <option value="SSD">SSD</option>
            <option value="Pen drive">Pen Drive</option>
            <option value="memory card">Memory Card</option>
          </select> -->
				<!-- <span class="error"> <?php echo $deviceErr;?></span> -->
       <!--  </div> -->
        <br><br>  

    		<!-- device detail -->
    		<div class="col-12 col-12-xsmall">
		      <label for="device detail"><b>Device detail</b></label>
		      <input type="text" placeholder="Enter device detail" name="device_detail" id="device_detail" value="<?php echo $device_detail;   ?>"><br>
        </div>
        <br><br>
        <div class="col-12 col-12-xsmall">
          <label for="problem"><b>Problem</b></label>
          <input type="text" placeholder="what is the problem" name="problem" id="problem" value="<?php echo $problem;   ?>"><br>
        </div>
        <br><br>
      	<!-- technician input -->
      	<div class="col-6 col-12-xsmall">
          <label for="technician"><b>Technician</b></label>
          <input type="text" placeholder="Enter technician name" name="technician" id="technician" value="<?php echo $technician;   ?>"><br>
        </div>
        <div class="col-6 col-12-xsmall">
          <label for="device1"><b>solution :</b></label>
          <select name="solution"  >
            <option value=""><?php echo $solution; ?></option>
            <option value="ok">OK</option>
            <option value="return">RETURN</option>
            <option value="Monitor">Monitor</option>
          </select>
        </div>  
        <div class="col-12 col-12-xsmall">
          <label for="status"><b>Status</b></label>
          <select name="status" id="category">
            <option value="New Arrived"><? echo $status;?></option>
            <!-- <option value="New Arrived">New Arrived</option> -->
            <option value="Waiting">Waiting</option>
            <option value="Return">Return</option>
            <option value="Completed">Completed</option>
            <option value="Dispatched">Dispatched</option>
          </select>
          
        </div>

        <div class="col-12 col-12-xsmall">
          <label for="problem"><b>Remark</b></label>
          <input type="text" placeholder="give remark" name="remark" id="remark" value="<?php echo $remark;   ?>"><br>
        </div>
      </div>
      <br><br>
      <div class="col-12">
        <ul class="actions ">
          <li><input type="submit" value="Update " class="primary" /></li>
          <li>
           <a href="entrybook.php">
             <input type="button" value="Back" onclick="entryBook.php" />
           </a> </li>
        </ul>
      </div>

    </form>
  </section>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/browser.min.js"></script>
  <script src="assets/js/breakpoints.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/daily-entry-validate.js"></script>
  <?php
}

else{
  echo "please log in";
}
?>
</body>
</html>