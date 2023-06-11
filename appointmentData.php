<?php

@include 'config.php';


session_start();

$useremail = $_SESSION['user_email'];

$sql = "SELECT id FROM user_form WHERE email = '$useremail'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];


 $name = $_POST['DoctorName'];
 $date = $_POST['date'];
 $Number = $_POST['Number'];


$sql = "INSERT INTO appointments (user_id, doctorName, day, number) VALUES('$user_id','$name','$date','$Number');";

$result = mysqli_query($conn,$sql);

header("Location:bookappointment.php");

}

?>