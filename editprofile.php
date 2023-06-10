<?php
     session_start();
     include 'config.php';
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
    <link rel="stylesheet" href="css/style2.css">

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
    </div>

    <div class="Userinfo">
    <?php
        // Check if the user is logged in
        if(isset($_SESSION['user_email'])) {
            $email = $_SESSION['user_email'];
            $sql = "SELECT * FROM user_form WHERE email = '$email'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Handle form submission
                    
                    // Get the updated values from the form
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $birthday = $_POST['birthday'];
                    $gender = $_POST['gender'];
                    $pnumber = $_POST['pnumber'];
                    
                    // Update the user's information in the database
                    $updateSql = "UPDATE user_form SET fname='$fname', lname='$lname', birthday='$birthday', gender='$gender', pnumber='$pnumber' WHERE email='$email'";
                    $updateResult = $conn->query($updateSql);
                    
                    if($updateResult) {
                        // If the update was successful, display a success message
                        echo '<p class="success-msg">User information updated successfully!</p>';
                        
                        // Update the displayed values
                        $row['fname'] = $fname;
                        $row['lname'] = $lname;
                        $row['birthday'] = $birthday;
                        $row['gender'] = $gender;
                        $row['pnumber'] = $pnumber;
                    } else {
                        // If the update failed, display an error message
                        echo '<p class="error-msg">Failed to update user information. Please try again.</p>';
                    }
                }
                
                // Display the user information and form
                echo '<h1>User Information</h1>';
                echo '<table>';
                echo '<tr><td>Full Name :</td><td>'.$row['fname'].' '.$row['lname'].'</td></tr>';
                echo '<tr><td>Date of Birth :</td><td>'.$row['birthday'].'</td></tr>';
                echo '<tr><td>Gender :</td><td>'.$row['gender'].'</td></tr>';
                echo '<tr><td>E-mail :</td><td>'.$row['email'].'</td></tr>';
                echo '<tr><td>Phone Number :</td><td>'.$row['pnumber'].'</td></tr>';
                echo '</table>';
                
                // Display the form for updating user information
                
                echo '<form method="post" action="">';
                echo '<input type="text" name="fname" value="'.$row['fname'].'" placeholder="First Name" required>'.'</br>';
                echo '<input type="text" name="lname" value="'.$row['lname'].'" placeholder="Last Name" required>'.'</br>';
                echo '<input type="date" name="birthday" value="'.$row['birthday'].'" placeholder="Date of Birth" required>'.'</br>';
                echo '<input type="radio" name="gender" value="male" '.($row['gender'] === 'male' ? 'checked' : '').'> Male'.'</br>';
                echo '<input type="radio" name="gender" value="female" '.($row['gender'] === 'female' ? 'checked' : '').'> Female'.'</br>';
                echo '<input type="tel" name="pnumber" value="'.$row['pnumber'].'" placeholder="Phone Number" required>'.'</br>';
                echo '<input type="submit" name="submit" value="Update Information">';
                echo '</form>';
            } else {
                echo "No results"; 
            }
        } else {
            echo "User not logged in.";
        }
    ?>
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