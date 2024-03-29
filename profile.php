<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

//Fetch user details from the database
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM user_form WHERE email = '$email'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $birthday = $row['birthday'];
    $gender = $row['gender'];
    $email = $row['email'];
    $pnumber = $row['pnumber'];
} else {
    // Handle user not found scenario
    $fname = '';
    $lname = '';
    $birthday = '';
    $gender = '';
    $email = '';
    $pnumber = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocConnect360 by VirtualVitals | Find a Doctor, Order Medicine</title>
    
    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">

</head>
<body>
    <div class="header-container">
        <div class="logo">
            <img class="logo-image" src="assets/logo.png">
        </div>
        <div class="header-info">
            <div class="email"><a href="mailto:hello@docconnect360.com">hello@docconnect360.com</a></div>
            <div class="phone">+94 112 123 123</div>
        </div>
    </div>    
   
    <div class="navbar-container">
            <div class="navlinks-container">
                <a href="after_login.php">Home</a>
                <a href="contact.php">Contact Us</a>
                <a href="about.php">About</a>
                <a href="bookAppointment.php" id="myAppointments">My Appointments</a>
                <a href="#" id="ambulance">Call an Ambulance</a>
            </div>
            <div class="login-container">
                <a href="logout.php" id="login">Logout</a>
            </div>
    </div>

    <div class="container">
        <div class="content">
            <h3>Hi, <span><?php echo $_SESSION['user_name'] ?></span></h3>
            <h1>Welcome to Your Profile</h1>
            <div class="profile-details">
                <h2>User Information</h2>
                <table>
                    <tr>
                        <th>Full Name:</th>
                        <td><?php echo $fname . ' ' . $lname; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo $birthday; ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo $gender; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail:</th>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number:</th>
                        <td><?php echo $pnumber; ?></td>
                    </tr>
                </table>
            </div >
            <a style="margin-top: 20px;" href="editprofile.php" class="btn">Edit Profile</a>

            <a style="margin-top: 20px;" href="deleteprofile.php" onclick="return confirm('Are your sure you want to delet your account ?');" class="btn">Delete Profile</a>
        </div>
    </div>
</body>
</html>
