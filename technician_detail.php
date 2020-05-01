<?php 
session_start();
?>

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
// Check existence of id parameter before processing further
		if(isset($_GET["id"])){
    $param_id = trim($_GET["id"]);
 	$connection=mysqli_connect('localhost','root','','acet_db');
    $sql = "SELECT * FROM users WHERE id = '$param_id'";
    	$result = $connection -> query($sql);
    	if ($result -> num_rows > 0) 
    	{
    		echo "connected";
          	while ($row = $result -> fetch_assoc()) 
			{
			$name = $row["f_name"]	;
			$address = $row["address"]	;
			$contact =$row["contact"] 	;	
			$gender = $row["gender"]	;	  
			// $email =$row["id"] ;	
			$u_name = $row["user_name"];
			$position=$row["post"];
			$id=$row["u_id"];	
			}			
        } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
} 	else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
	}
?>
</head>
<body >

<?php  

if(isset($_SESSION["user"])){
	
?>	
<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<div id="heading" >
				<h1>Technician info</h1>
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
		<h3 align="center"><b>technician info</b></h3><br>

		<form method="post" action="" width="50%">
			<div class="row gtr-uniform">
				<div class="col-4 col-12-xsmall">
					<label>Full Name :</label>
					<input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Person Name" readonly/>
					<!-- <span class="error"> <?php echo $nameErr;?></span> -->
				</div>
				<div class="col-8 col-12-xsmall">
					<label>Address :</label>
					<input type="text" name="Address" id="Address" value="<?php echo $address;?>" placeholder="Address"readonly />
					<!-- <span class="error"> <?php echo $addressErr;?></span> -->
				</div>
				<div class="col-4 col-12-xsmall">
					<label>Contact :</label>
					<input type="text" name="Contact" id="Contact" value="<?php echo $contact;?>" placeholder="Contact"readonly />
					<!-- <span class="error"> <?php echo $contactErr;?></span> -->
				</div>
				<div class="col-6 col-12-xsmall">
					<label>ID :</label>
					<input type="text" name="id" id="id" value="<?php echo $id; ?>" placeholder="Technician ID"readonly /><span class="error">
				</div>
				<!-- gender -->
				<div class="col-6 col-12-small">					
					<label for="gender">Gender :</label>
					<input type="text" name="gender" id="gender" value="<?php echo $gender; ?>" placeholder="" readonly/><span class="error">
				</div>
				<!-- radio -->
								
				<!-- Break -->
				<div class="col-6 col-12-xsmall">
					<label>User Name</label>
					<input type="text" name="u_name" id="u_name" value="<?php echo $u_name;  ?>" placeholder="User Name"readonly />
				</div>
				 <div class="col-6 col-12-xsmall">
		      <label for="post"><b>Position :</b></label>
		     	<input type="text" name="position" id="category" value="<?php echo $position;  ?>" readonly>
				
		<br><br>	</div>


				
				<!-- Break -->
				<div class="col-12" align="center6">
					<ul class="actions ">
						<li > <a href="office-system.php"><input type="button" value="Home" /></a> </li>
					</ul>
				</div>
			</div>
		</form>
</section>

	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

<?php
}


else{
	header("location: login.php");
}
?>
</body>
</html>