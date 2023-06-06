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
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

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
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
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
      
      <input type="radio" name="gender" value="male"><label>Male</label>
      <input type="radio" name="gender" value="female"><label>Female</label>
      
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="checkbox" name="terms" value="true"><label>accept terms and conditions</label>
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <!-- <input type="hidden" name="userType" value="user"> -->
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>