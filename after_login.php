<?php

@include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DocConnect360 by VirtualVitals | Find a Doctor, Order Medicine</title>
    
    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="css/style.css">
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
                <a href="contact.php">Contact Us</a>
                <a href="#">About</a>
                <a href="#" id="myAppointments">My Appointments</a>
                <a href="#" id="ambulance">Call an Ambulance</a>
            </div>

            

            <div>
            <p style="color: #ffffff;">User : <span><?php echo $_SESSION['user_name'] ?></span></p>
            <p style="color: #ffffff;"><span><?php echo $_SESSION['user_email'] ?></span></p>
            </div>    


            <div class="login-container">
                <a href="profile.php" id="login">View Profile</a>
                <a href="logout.php" id="signup">Logout</a>
            </div>
        </div>
    <div class="main-container">
        <div class="banner">
            <img src="assets/banner.jpg" class="banner">
            <div class="banner-txt">DocConnect360 is Sri Lanka's Largest eChannelling Platform</div>

            <div class="booking">
                <a href="bookAppointment.php">
                    <button>BOOK AN APPOINTMENT</button>
                </a>
                <a href="searchdoctor.php">
                    <button>SEARCH A DOCTOR</button>
                </a>
            </div>


        </div>
        <div class="mainbg">
            <img src="assets/main-background.jpg" class="mainbg">
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
            <p>Connect us on</p>
            <img src="assets/social.png" class="social">
            <p>Download our free app</p>
            <img src="assets/apps.png" class="apps">
        </div>
    </div>       
</body>
</html>
