 <?php include 'includes/db_connection.php'; ?>
<?php
 $customer_nameErr = $addressErr = $contactErr = $deviceErr = $statusErr =$typeerr= "";
 $customer_name = $address = $contact = $status = $solution = $technician = $device = $device_detail = $entry_number = $dates =$problem=$type="";
	function test_input($data) 
  	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
 	}
  	if ($_SERVER["REQUEST_METHOD"] == "POST") 
 	{
      $entry_number=test_input($_POST["entry_number"]);
      $dates=test_input($_POST["dates"]);
      $device_detail=test_input($_POST["device_detail"]);
      $solution=test_input($_POST["solution"]);
      $technician=test_input($_POST["technician"]);
      $problem=test_input($_POST["problem"]);
      $type=test_input($_POST["type"]);
      $customer_name =test_input($_POST["customer_name"]);
      $address = test_input($_POST["address"]);
	  $status = test_input($_POST["status"]);
	  $contact = test_input($_POST["contact"]);

	  if (!preg_match("/^[a-zA-Z ]*$/",$customer_name)) 
  	  // check if name only contains letters and whitespace 
  	  {
   	  $customer_nameErr = "Only letters and white space allowed"; 
  	  }
  	  else
  	  {
  		$customer_name = test_input($_POST["customer_name"]);
  	  }
     
	      

	    if (empty($_POST["device"])) 
	    {
	      $deviceErr = "device is required";
	    } 
	    if ($type==="laptop") {
	      $device = test_input($_POST["device"]);
	    	
	    }
	    else if ($type==="desktop") {
	      $device = test_input($_POST["device1"]);
	    	
	    }
	    else
	    {
	      $device = test_input($_POST["device2"]);
	    }

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO entry_book (type,entry_no,dates,c_name,c_contact,c_address,d_name,d_detail,problem,solution,status,tech_name) VALUES (?,?,?,?,?,?,?,?,?,?, ?,?)");
		$stmt->bind_param("ssssssssssss",$type,$entry_number,$dates,$customer_name,$contact,$address,$device,
			$device_detail,$problem,$solution,$status,$technician);
		if($stmt->execute());
		// set parameters and execute if (mysqli_query($conn, $sql)) 
    	{
    	
    		echo "<script>alert('data inserted successfully')</script>";
    		header("location: office-system.php");
    	} 
		$stmt->close();
		$conn->close();
	}
?>