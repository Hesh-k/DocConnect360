<?php
	//including config.php file required to establish the database connection
	include_once "config.php";

	//taking values from form data
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$email = $_REQUEST['email'];
	$message = $_REQUEST['message'];

	//performing insert query execution
	$sql = "INSERT INTO tickets (fname, lname, email, message)
	VALUES ('$fname', '$lname', '$email', '$message')";

	if(mysqli_query($conn, $sql)){
		echo "<script>alert('Ticket submitted successfully!')</script>";
		echo "<script>window.location.href = 'tickets.php';</script>";
		exit(); 
	} else{
		echo "ERROR! $sql. " . mysqli_error($conn);
	}

	//closing connection
	mysqli_close($conn);
?>