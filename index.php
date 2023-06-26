<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DocConnect360 by VirtualVitals | Find a Doctor, Order Medicine</title>
    
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/slideshow.css">
</head>

<?php
    include_once "header.php"
?>
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
  <img src="assets/sld3.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<div class="main-container">

            <div class="banner-txt">DocConnect360 is Sri Lanka's Largest eChannelling Platform</div>
            <div class="booking">
                
                <a href="login_form.php">
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

<body>
<script src="js/slideshow.js"></script>
</body>
</html> 

<?php
    include_once "footer.php"
?>




