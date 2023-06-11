<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RxRunners - Order Medicine</title>

    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <link rel="stylesheet" href="styles/placeOrder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="form">
        <h2>PLACE YOUR ORDER</h2>
        <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="orders.php">&nbsp;View Orders</a></button>
        <form action="submitOrder.php" method="POST">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" required><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" required><br><br>
            <label for="text">Medicine You Require:</label><br>
            <input type="text" id="medicine" name="medicine" required><br><br>
            <input type="submit" id="submitBtn" value="Submit">
        </form>
    </div>
</body>
</html>
