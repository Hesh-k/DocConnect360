<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>

    <link rel="stylesheet" href="styles/tickets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <h2>My Tickets</h2>
        <button id="add-new"><i class="fa-solid fa-plus"></i><a href="contact.php">&nbsp;New Ticket</a></button>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Date/Time</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            <?php
                ini_set('display_errors', 0);
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                session_start();
                include_once "config.php";

                // Get the user's email from the session
                $useremail = $_SESSION['user_email'];

                // Fetch the tickets submitted by the corresponding user
                $sql = "SELECT * FROM tickets WHERE email = '$useremail'";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$row[ticket_id]</td>
                    <td>$row[timestamp]</td>
                    <td class='message' title='$row[message]'>$row[message]</td>
                    <td>
                        <a class='btn btn-success' href='editTicket.php?ticket_id=$row[ticket_id]'>Edit</a>
                        <a class='btn btn-danger' href='deleteTicket.php?ticket_id=$row[ticket_id]'>Delete</a>
                    </td>
                </tr>
                ";
                }
            ?>
        </table>
    </div>
</body>
</html>
