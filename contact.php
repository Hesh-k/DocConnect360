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
        <h2>CONTACT US</h2>
        <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="tickets.php">&nbsp;View Tickets</a></button>
        <form action="submitTicket.php" method="POST">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" required><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>
            <input type="submit" id="submitBtn" value="Submit">
        </form>
    </div>
</body>
</html>
