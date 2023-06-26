<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>

    <link rel="stylesheet" href="styles/appointments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
    <div class="container">
        <h2>Current Appointments</h2>
        <button id="add-new"><i class="fa-regular fa-calendar"></i><a href="bookAppointment.php">&nbsp;New Appoinment</a></button>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
            <?php

                ini_set('display_errors', 0);
                error_reporting(E_ERROR | E_WARNING | E_PARSE);

                session_start();
                include_once "config.php";

                $userid = $_SESSION['user_id'];

                $sql = "SELECT * FROM appointments WHERE user_id = '$userid'";
                $result = $conn->query($sql);


        

                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$row[appointment_id]</td>
                    <td>$row[doctorName]</td>
                    <td>$row[day]</td>
                    <td>$row[number]</td>
                    <td>
                        <a class='btn btn-success' href='editAppointment.php?appointment_id=$row[appointment_id]'>Reschedule</a>
                        <a class='btn btn-danger' href='deleteAppointment.php?appointment_id=$row[appointment_id]'>Cancel</a>
                    </td>
                </tr>
                ";}
                
            ?>
        </table>
    </div>
</body>
</html>
