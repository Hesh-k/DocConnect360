<?php
  include "config.php";

  $ticket_id="";
  $fname="";
  $lname="";
  $email="";
  $message="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['ticket_id'])){
      header("location:tickets.php");
      exit;
    }
    $ticket_id = $_GET['ticket_id'];
    $sql = "SELECT * FROM tickets WHERE ticket_id=$ticket_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: tickets.php");
      exit;
    }
    $fname=$row["fname"];
    $lname=$row['lname'];
    $email=$row["email"];
    $message=$row["message"];

  }
  else{
    $ticket_id=$_POST["ticket_id"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $message=$_POST["message"];

    $sql = "UPDATE tickets SET fname='$fname', lname='$lname', email='$email', message='$message' WHERE ticket_id='$ticket_id'";
    $result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Questions?</title>

    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="form">
        <h2>Edit Your Ticket</h2>
        <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="tickets.php">&nbsp;View Tickets</a></button>
        <form action="editTicket.php" method="POST">
            <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required><?php echo $message; ?></textarea><br><br>
            <input type="submit" id="submitBtn" value="Submit">
        </form>
    </div>
</body>
</html>
