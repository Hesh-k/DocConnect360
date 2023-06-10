<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

// Fetch user details from the database
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
                <a href="#">Home</a>
                <a href="#">Contact Us</a>
                <a href="#">About</a>
                <a href="#" id="myAppointments">My Appointments</a>
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
            </div>
            <a href="editprofile.php" class="btn">Edit Profile</a>
            <a href="deleteprofile.php" class="btn">Delete Profile</a>
        </div>
    </div>

    <div class="footer-container">
        <div class="footer-info">
            <p>A VirtualVitals Company<br>Copyright (C) 2023 by VirtualVitals</p>
            <p>DocConnect360,<br>VirtualVitals Terrace,<br>Malabe,<br>Sri Lanka 10115</p>
        </div>
        <div class="footer-navbar">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms and Conditions</a>
            <a href="#">Our Mission</a>
        </div>
        <div class="social-buttons">
            <p>Connect with us on</p>
            <img src="assets/social.png" class="social">
            <p>Download our free app</p>
            <img src="assets/apps.png" class="apps">
        </div>
    </div>       
</body>
</html>
