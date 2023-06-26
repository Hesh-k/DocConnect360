<?php
include 'config.php';

if(isset($_POST['id'])){
   
    $id = $_POST["id"];


    $sql = "DELETE FROM user_form WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
       header('location: userdata.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>




