<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

    <link rel="stylesheet" href="styles/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <h2>My orders</h2>
        <button id="add-new"><i class="fa-solid fa-plus"></i><a href="placeOrder.php">&nbsp;New Order</a></button>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Date/Time</th>
                <th>Medicine</th>
                <th>Actions</th>
            </tr>
            <?php
                include_once "config.php";
                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$row[order_id]</td>
                    <td>$row[timestamp]</td>
                    <td>$row[medicine]</td>
                    <td>
                        <a class='btn btn-danger' href='deleteorder.php?order_id=$row[order_id]'>Delete</a>
                    </td>
                </tr>
                ";
                }
            ?>
        </table>
    </div>
</body>
</html>
