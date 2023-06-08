<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $nic = mysqli_real_escape_string($conn, $_POST['nic']);
   $newPass = md5($_POST['new_password']);
   $confirmNewPass = md5($_POST['confirm_new_password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' AND nic = '$nic'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {
      if ($newPass === $confirmNewPass) {
         $update = "UPDATE user_form SET password = '$newPass' WHERE email = '$email' AND nic = '$nic'";
         mysqli_query($conn, $update);
         $_SESSION['reset_success'] = true;
         header('location: login_form.php');
         exit();
      } else {
         $error = 'Passwords do not match!';
      }
   } else {
      $error = 'Invalid email or NIC!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forgot Password Reset Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Password Reset</h3>
      <?php
      if(isset($error)){
         echo '<span class="error-msg">'.$error.'</span>';
      };
      ?>
      <?php
      if(isset($_SESSION['reset_success']) && $_SESSION['reset_success'] === true){
        /* echo '<span class="success-msg">Password reset successfully! Please log in with your new password.</span>';*/
         unset($_SESSION['reset_success']);
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="text" name="nic" required placeholder="Enter your NIC">
      <input type="password" name="new_password" required placeholder="Enter your new password">
      <input type="password" name="confirm_new_password" required placeholder="Confirm your new password">
      <input type="submit" name="submit" value="Reset Password" class="form-btn">
   </form>

</div>

</body>
</html>
