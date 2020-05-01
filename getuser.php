<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','acet_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
function type($q){
mysqli_select_db($con,"acet_db");
$sql="SELECT * FROM entry_book WHERE type = $q";
$result = mysqli_query($con,$sql);
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
while($row = mysqli_fetch_array($result)) {
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

                                    echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    // echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                            echo "</tr>";
}
echo "</tbody>";
echo "</table>";
mysqli_close($con);
?>	
}

</body>
</html>