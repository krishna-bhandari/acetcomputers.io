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
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
	<header id="header">
				<a class="logo" href="office-system.php">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<div id="heading" >
				<h1>Technician Info</h1>
			</div>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="office-system.php">Home</a></li>
					<li><a href="acet shop.php">Acet Shop</a></li>
					<li><a href="#">Acet Courses</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
					<li><a href="logOut.php">Log Out</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="elements.php">Elements</a></li>
				</ul>
			</nav>
	<div class="table-wrapper">
		<table class="alt">
			<?php
			// $id="";
				$sn='1';
 				$connection=mysqli_connect('localhost','root','','acet_db');
            	$sql = " SELECT id,`u_id`, `f_name`,  `post`,`contact`  FROM `users` ORDER BY u_id ASC";
            	$result = $connection -> query($sql);
            	if ($result -> num_rows > 0) 
            	{
            		  echo "<tbody><tr><td><b>SN</b></td><td><b>ID</b></td>
						<td><b>Name</b></td><td><b>Post</b></td>
						<td colspan='2'>Actions</td></tr>";
	              	while ($row = $result -> fetch_assoc()) 
	              	{
			          
	              		// $id=$row["id"];
						echo"<tr><td>$sn</td><td>".strtoupper($row["u_id"])."</td>
						<td>".strtoupper($row["f_name"])."</td><td>".strtoupper($row["post"])."</td><td>
						<a href='technician_detail.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a></td><td>
						<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a></td></tr></tbody>";
 

			            $sn+=1;
				            }
			            	echo "
			            	<table><tr><td>
					<ul class='actions '>
					<li><a href='register.php' class='button primary small fit'>Add New Staff</a></li>
					<li><a href='office-system.php' class='button primary small fit'>Return to Home</a></li>
					</ul> </td></tr></table>";	
	              	
	              
				}
            		else{
            	 ?>
		</table>
	</div>
				<?php echo "<center><h1>no results found</h1></center>"; ?>
				<?php
             		echo "
					<ul class='actions '>
					<li><a href='register.php' class='button primary small fit'>Add New Staff</a></li>
					<li><a href='office-system.php' class='button primary small fit'>Return to Home</a></li>
					</ul>";
           			}

           		?>
           			
					<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>