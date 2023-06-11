<?php
@include 'config.php';

session_start();

$useremail = $_SESSION['user_email'];

// Retrieve the user ID from the user_form table
$sql = "SELECT id FROM user_form WHERE email = '$useremail'";
$result = $conn->query($sql);

// Check if the query was successful and fetch the user ID
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    // Taking values from form data
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];

    // Performing insert query execution
    $sql = "INSERT INTO tickets (user_id, fname, lname, email, message)
            VALUES ('$user_id', '$fname', '$lname', '$useremail', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Ticket submitted successfully!')</script>";
        echo "<script>window.location.href = 'tickets.php';</script>";
        exit();
    } else {
        echo "ERROR! $sql. " . mysqli_error($conn);
    }
} else {
    echo "Failed to fetch user ID.";
}

// Closing the connection
mysqli_close($conn);
?>
