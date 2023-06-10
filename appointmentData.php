<?php

include_once 'config.php';

 $name = $_POST['DoctorName'];
 $date = $_POST['date'];
 $Number = $_POST['Number'];


$sql = "INSERT INTO appointments (doctorName, day, number) VALUES('$name','$date','$Number');";

$result = mysqli_query($conn,$sql);

header("Location:bookappointment.php");

?>