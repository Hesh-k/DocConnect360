<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pnumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
   $usernic = mysqli_real_escape_string($conn, $_POST['nic']);
   $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
   $gender = $_POST['gender'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $terms = $_POST['terms'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);


   if($terms == 'true'){
   

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(fname, lname, email, pnumber, nic, birthday, gender, password, user_type) VALUES('$fname','$lname','$email','$pnumber','$usernic','$birthday','$gender','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

   }else{$error[] ='Please accept the terms and conditions !';}

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
   <link rel="stylesheet" href="css/styles.css">
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
                <a href="#">Contact Us</a>
                <a href="#">About</a>
                <a href="#" id="myAppointments">My Appointments</a>
                <a href="#" id="ambulance">Call an Ambulance</a>
            </div>
            <div class="login-container">
                <a href="login_form.php" id="login">Login</a>
                <a href="register_form.php" id="signup">Sign Up</a>
            </div>
        </div>






   
<div class="form-container">

   <form action="" method="post">
      <h3>DocConnect360</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="fname" required placeholder="enter your first name">
      <input type="text" name="lname" required placeholder="enter your last name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="tel" name="pnumber"  required placeholder="enter your mobile number">
      <input type="text" name="nic" required placeholder="enter your NIC">
      <input type="text" name="birthday" required placeholder="enter your birthday" onfocus="(this.type='date')" onblur="(this.type='text')">

      <div style=" display:flex;flex-direction:raw;">
       <input style="width:fit-content;margin-left:20px;margin-right:20px;margin-top:10px;" type="radio" name="gender" value="male"><label style="margin-top:5px;">Male</label>
       <input style="width:fit-content;margin-left:20px;margin-right:20px;margin-top:10px;" type="radio" name="gender" value="female"><label style="margin-top:5px;">Female</label>
      </div>

      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">

      <div style="display:flex;">
       <input style="width:fit-content;margin-right:10px;" type="checkbox" name="terms" value="true"><label style="margin-top:6px;">Accept terms and conditions</label>
      </div>

      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <!-- <input type="hidden" name="userType" value="user"> -->
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      
      <p>Already have an account ? <a style="" href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>