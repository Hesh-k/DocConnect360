<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

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
   <title>Sign Up</title>

   <!-- custom css file link  -->
   <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="js/script.js"></script>

</head>

<?php
    include_once "header.php"
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>CREATE AN ACCOUNT</h3>
  
      <input type="text" name="fname" placeholder="First name" required>
      <input type="text" name="lname" placeholder="Last name" required>
      <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      <input type="tel" name="pnumber" placeholder="Mobile number" pattern="^(?:\+94|0)[0-9]{9}$" required>
      <input type="text" name="nic" pattern="^\d{9}[vV]$|^\d{12}$" placeholder="NIC (123456789V)" required>
      <input type="text" name="birthday" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" required>

      <div style=" display:flex;flex-direction:raw;">
       <input style="width:fit-content;margin-left:20px;margin-right:20px;margin-top:10px;" type="radio" name="gender" value="male"><label style="margin-top:5px;">Male</label>
       <input style="width:fit-content;margin-left:20px;margin-right:20px;margin-top:10px;" type="radio" name="gender" value="female"><label style="margin-top:5px;">Female</label>
      </div>

      <input type="password" id="pwd1" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" onkeyup='check();' required placeholder="Password">
      <div style="display:flex;">
         <lable for="pwd1" style="font-size:12px;"> Should contain A-Z a-z 0-9 !@#... (min 8 char) </label>
      </div>
      <input type="password" id="pwd2" name="cpassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" onkeyup='check();' required placeholder="Retype password">
      <span id='msg'></span>

      <div style="display:flex;">
       <input style="width:fit-content;margin-right:10px;" type="checkbox" name="terms" value="true"><label style="margin-top:6px;">Accept terms and conditions</label>
      </div>


      <input type="hidden" name="user_type" value="user">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      
      <p>Already have a user? <a style="" href="login_form.php">Login</a></p>
   </form>
</div>