<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Doctor</title>
    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <?php
                session_start();
                include_once 'config.php';

                if (isset($_SESSION['user_email'])) {
                    echo '<a href="profile.php" id="login">View Profile</a>';
                }
                else{
                    echo '<a href="login_form.php" id="login">Login</a>';
                }
                ?>
                
            </div>
        </div>
  <div>  
  <div >       
    <form class="searchbox" action="" method="post">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit" value="Search"><i class="fa fa-search"></i></button>
    </form>
 </div>
<div class="search_result">

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'config.php';

    $search = $_POST['search'];

    $sql = "SELECT * FROM doctor WHERE fname = '$search' OR lname = '$search'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<table>';
      echo '<tr><th>Name</th><th>Specializations</th></tr>';
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="name">' . $row['fname'] . ' ' . $row['lname'] . '</td>';
        echo '<td class="specializations">' . $row['specializations'] . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo '<p class="no_results">No Doctors Found :(</p>';
    }
  }
  ?>
</div>
</div>

    <div class="footer-container-search">
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
