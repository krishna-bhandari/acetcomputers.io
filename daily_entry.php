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
  <?php  

if(isset($_SESSION["user"])){
  
?> 
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
    <h1>Daily Entry</h1>
  </div>
  <section id="main" class="wrapper">
    <p><span class="error">* required field</span></p>
    <form method="post" action="daily-entry-validate.php" name="device_entry_form" 
    onsubmit="return validate()"  >
      <div class="row gtr-uniform">
        <div class="col-12 col-12-xsmall">
          <label for="type"><b>Type</b></label>
          <select name="type" id="type" onmouseout ="check()">
            <option value="laptop">Laptop</option>
            <option value="desktop">Desktop</option>
            <option value="recovery">Recovery</option>
          </select>
          <span class="error"> </span>
          <br><br>  
        </div>
        <div class="col-6 col-12-xsmall">
          <label for="entry number"><b>Entry Number</b></label>
          <input type="text" placeholder="" name="entry_number" id="entry_number" value="" >
          <span class="error" id="entry_number_error"> </span>
           
         <br>
        </div>
        <div class="col-6 col-12-xsmall">
          <label for="Date"><b>Date :</b></label>
          <input type="text" placeholder="" name="dates" id="dates" value="" readonly=""><br>
          <script>
            const d = new Date()
            const year = d.getFullYear() // 2019
            const month=d.getMonth()
            const date = d.getDate()
            device_entry_form.dates.value = year+"/"+month+"/"+date;
            </script>
        </div>
        <!-- customer name input -->
    		<div class="col-6 col-12-xsmall">
  	      <label for="customer_name"><b>Customer Name</b></label>
  	      <input type="text" placeholder="Enter Customer Name" name="customer_name" id="c_name" value="" onmouseout ="check1()"><br>
  	      <span class="error" id="c_name_error"> </span>
    		</div>
    		<br><br>
    		      	<!-- contact input -->
    		<div class="col-6 col-12-xsmall">
  	      <label for="contact"><b>Contact</b></label>
  	      <input type="text" placeholder="Enter Contact" name="contact" id="contact" onmouseout ="check1()"><br>
  	      <span class="error" id="contact_error"></span>
    		</div>
    		<br><br>
    		<!-- address input-->
	    	<div class="col-6 col-12-xsmall">
  	      <label for="address"><b>Address</b></label>
  	      <input type="text" placeholder="Enter address" name="address" id="address" value=""onmouseout ="check1()"><br>
  	      <span class="error" id="address_error"> </span>
        </div>
       	<br><br>
        <!-- device selection -->
        <div class="col-6 col-12-xsmall"id="category_laptop" style="display:none;">
          <label for="device"><b>Device :</b></label>
          <select name="device" >
            <option value="">- Select -</option>
            <option value="HP">HP</option>
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
            <option value="Others">Others</option>
          </select>
        </div>
		    <div class="col-6 col-12-xsmall" id="category_desktop">
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
          </select>
				<!-- <span class="error"> <?php echo $deviceErr;?></span> -->
        </div>
        <br><br>  

    		<!-- device detail -->
    		<div class="col-12 col-12-xsmall">
		      <label for="device detail"><b>Device detail</b></label>
		      <input type="text" placeholder="Enter device detail" name="device_detail" id="device_detail" value=""><br>
        </div>
        <br><br>
        <div class="col-12 col-12-xsmall">
          <label for="problem"><b>Problem</b></label>
          <input type="text" placeholder="what is the problem" name="problem" id="problem" value=""><br>
        </div>
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
          <select name="status" id="category">
            <option value="New Arrived">New Arrived</option>
            <option value="Waiting">Waiting</option>
            <option value="Return">Return</option>
            <option value="Completed">Completed</option>
            <option value="Dispatched">Dispatched</option>
          </select>
          
        </div>
      </div>
      <br><br>
      <div class="col-12">
        <ul class="actions ">
          <li><input type="submit" value="Submit " class="primary" /></li>
          <li><input type="reset" value="Reset" /></li>
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