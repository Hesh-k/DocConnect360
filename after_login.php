<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

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
    <link rel="stylesheet" href="styles/slideshow.css">
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
                <a href="about.php">About</a>
                <a href="bookAppointment.php" id="myAppointments">My Appointments</a>
                <a href="#" id="ambulance">Call an Ambulance</a>
            </div>

            

            <div>
            <p style="color: #ffffff;"><span><?php echo 'User :'. $_SESSION['user_name'] ?></span></p>
            <p style="color: #ffffff;"><span><?php echo $_SESSION['user_email'] ?></span></p>
            </div>    


            <div class="login-container">
                <a href="profile.php" id="login">View Profile</a>
                <a href="logout.php" id="signup">Logout</a>
            </div>
        </div>
    <div class="main-container">

            <div class="banner-txt">DocConnect360 is Sri Lanka's Largest eChannelling Platform</div>

            <div class="booking">

                <a href="bookAppointment.php">
                    <button>BOOK AN APPOINTMENT</button>
                </a>
                <a href="searchdoctor.php">
                    <button>SEARCH A DOCTOR</button>
                </a>
                <a href="placeOrder.php">
                    <button>ORDER MEDICINE</button>
                </a>
            </div>


        </div>
        
        <div class="slideshow-container">

        <div class="mySlides fade">
         <div class="numbertext">1 / 3</div>
        <img src="assets/sld1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="assets/sld2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="assets/sld3.jpeg" style="width:100%">
        </div>

        </div><br>

            <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
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


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 4000); // Change image every 2 seconds
        }
     </script>
    
</body>
</html>
