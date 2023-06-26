<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];

    // Delete the record from the database
    $deleteQuery = "DELETE FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {

        header('location: index.php');
    } else {
        // Failed to delete the record
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    
    echo "User not logged in.";
}

?>
