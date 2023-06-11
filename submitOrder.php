<?php
	//including config.php file required to establish the database connection
	include_once "config.php";

	//taking values from form data
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$medicine = $_REQUEST['medicine'];
	$userID = $_REQUEST['id'];

	//performing insert query execution
	$sql = "INSERT INTO orders (user_id, timestamp, fname, lname, medicine)
	VALUES ('$userID', '', '$fname', '$lname', '$medicine')";

	if(mysqli_query($conn, $sql)){
		echo "<script>alert('Order submitted successfully!')</script>";
		echo "<script>window.location.href = 'orders.php';</script>";
		exit(); 
	} else{
		echo "ERROR! $sql. " . mysqli_error($conn);
	}

	//closing connection
	mysqli_close($conn);
?>