<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'user'){

         $idselect = " SELECT id FROM user_form WHERE email = '$email'";
         $idresult = mysqli_query($conn, $idselect);


         $_SESSION['user_name'] = $row['fname'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:after_login.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login to DocConnect360</title>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="styles/styles.css">

</head>
<body>

<?php
    include_once "header.php"
?>
<div class="form-container">

   <form action="" method="post">
      <h3>User Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      <input type="password" name="password" required placeholder="Password">
      <div>
      <p>Forgot password? <a href="forgetpass.php">Reset</a></p>
      </div>
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Sign Up</a></p>
   </form>

</div>