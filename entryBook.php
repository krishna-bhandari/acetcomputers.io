<!DOCTYPE html>
<?php
session_start();
 ?>
<html>
<head>
	<title>entry book.com</title>
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
 	<style type="text/css">
        /*.wrapper{
            width: 850px;
            margin: 0 auto;
        }*/
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php  

if(isset($_SESSION["user"])){
	
?>	
	<header id="header">
		<a class="logo" href="office-system.php">A-CET Computers</a>
		<nav>
			<p align="right">WELCOME "<?php echo(strtoupper($_SESSION["user"]));?>"</p>
		</nav>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
	</header>
	<div id="heading" >
		<h1>Entry Book</h1>
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
	<section class="wrapper">

		<ul class="actions">
			<div class="col-6 col-12-xsmall">
				<input type="text" name="search" id="myInput" value="" placeholder="search here" style="font-size: 15px; width: 90%; margin: 20px;"/>
			</div>
			<button class="button primary icon fa-search"onclick="myFunction()" style="font-size: 15px; width: 10%; margin: 20px;">Search</button>
		</ul>
		<ul class='actions '>
		<button class='button primary small fit' onclick="myFunction1('desktop')"style="font-size: 15px; width: 20%; margin: 20px;">Desktop Entry</button>
		<button class='button primary small fit' onclick="myFunction1('laptop')"
		style="font-size: 15px; width: 20%; margin: 20px;">Laptop Entry</button>
		<button class='button primary small fit' onclick="myFunction1('field')"style="font-size: 15px; width: 20%; margin: 20px;">Field Entry</button>
	
		<button class='button primary small fit' onclick="myFunction1('recovery')"style="font-size: 15px; width: 20%; margin: 20px";>Recovery</button>
		</ul>

<script>
    function myFunction(){
        // Declare variables 
	    var input, filter, table, tr, td, i, txtValue;
	    input = document.getElementById("myInput");
	    filter = input.value.toUpperCase();
	    table = document.getElementById("myTable");
	    tr = table.getElementsByTagName("tr");
	    // Loop through all table rows, and hide those who don't match the search query
	    for (i = 0; i < tr.length; i++) 
	    {
	      td = tr[i].getElementsByTagName("td")[3];
	      if (td) 
	      {
	        txtValue = td.textContent || td.innerText;
	        if (txtValue.toUpperCase().indexOf(filter) > -1) 
	        {        
	          tr[i].style.display = "";      
	        } 
	        else 
	        {        
	          tr[i].style.display = "none";    
	        }
	      } 
	    }       
    }
    function myFunction1(type){
    	// Declare variables 
    	var input, filter, table, tr, td, i, txtValue;
    	// input = document.getElementById("myInput1");
    	input=type;
    	filter = input.toUpperCase();
    	table = document.getElementById("myTable");
    	tr = table.getElementsByTagName("tr");
    	// Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) 
        {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) 
          {
             txtValue = td.textContent || td.innerText;
             if (txtValue.toUpperCase().indexOf(filter) > -1) 
             {        
            	tr[i].style.display = "";      
             } 
             else 
             {        
                tr[i].style.display = "none";    
             }
           } 
        }       
    }
</script>

<div id="txtHint">

				
    <?php
			$link=mysqli_connect('localhost','root','','acet_db');
	        // Attempt select query execution
	        $sql = "SELECT * FROM entry_book";
	        if($result = mysqli_query($link, $sql)){
	            if(mysqli_num_rows($result) > 0){
	                echo "<table class='table table-bordered table-striped' width='100%' id='myTable'>";
	                    echo "<thead>";
	                        echo "<tr>";
	                            // echo "<th>#</th>";
	                            echo strtoupper("<th style='font-size:15px;'>type</th>");
	                            echo strtoupper("<th style='font-size:15px;'>entry number</th>");
	                            echo strtoupper("<th style='font-size:15px;'>date</th>");
	                            echo strtoupper("<th style='font-size:15px;'>customer name</th>");
	                            echo strtoupper("<th style='font-size:15px;'>contact</th>");
	                            echo strtoupper("<th style='font-size:15px;'>address</th>");
	                            echo strtoupper( "<th style='font-size:15px;'>device</th>");
	                            echo strtoupper("<th style='font-size:15px;'>device detail</th>");
	                            echo strtoupper("<th style='font-size:15px;'>problem</th>");
	                            echo strtoupper("<th style='font-size:15px;'>solution</th>");
	                            echo strtoupper("<th style='font-size:15px;'>status</th>");
	                            echo strtoupper("<th style='font-size:15px;'>technician name</th>");
                                echo strtoupper("<th style='font-size:15px;'colspan='2'>Action</th>");

	                        echo "</tr>";
	                    echo "</thead>";
	                    echo "<tbody>";
                    	while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                                // echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['type'] . "</td>";
                                echo "<td>" . $row['entry_no'] . "</td>";
                                echo "<td>" . $row['dates'] . "</td>";
                                echo "<td>" . $row['c_name'] . "</td>";
                                echo "<td>" . $row['c_contact'] . "</td>";
                                echo "<td>" . $row['c_address'] . "</td>";
                                echo "<td>" . $row['d_name'] . "</td>";
                                echo "<td>" . $row['d_detail'] . "</td>";
                                echo "<td>" . $row['problem'] . "</td>";
                                echo "<td>" . $row['solution'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>" . $row['tech_name'] . "</td>";

                                echo "<td>";
                                    echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "</td>";
                                echo "<td>";

                                    echo "<a href='update_entry.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    // echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    // Free result set
                    // mysqli_free_result($result);
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
    ?>

</div>

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