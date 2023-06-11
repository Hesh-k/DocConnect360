
<!DOCTYPE html>
<html >
<head>
    <title>Book Appoinment</title>
    <link rel='stylesheet' href="styles/bookAppointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
<div class="form">
    <form method="POST" action="appointmentData.php">
        <h2>Book Appointment</h2>
        <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="appointments.php">&nbsp;View Appointments</a></button>
        <div class="input-container ic2">
            <?php
            include_once 'config.php';

            $sql = "SELECT doctor_id, fname, lname FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<select name="DoctorName" class="input">';
                while ($row = $result->fetch_assoc()) {

                    $fname = $row['fname'];
                    $lname = $row['lname'];

                    echo "<option>$fname $lname</option>";
                }
                echo '</select>';
            } else {
                echo 'No data available.';
            }

            $conn->close();
            ?>
            <div class="cut"></div>
        </div>
        <div class="input-container ic2">
            <input type="date" class="input" name="date" id="date" required>
            <div class="cut"></div>
        </div>
        <div class="input-container ic2">
            <input type="text" class="input" name="Number" placeholder="Phone Number" required>
            <div class="cut cut-short"></div>
        </div>
        <div>
            <input type="submit" class="submit" value="Confirm Appointment" onclick="showAlert()">
        </div>
    </form>
</div>
<script type="text/javascript">
    function showAlert() {
        alert("You have successfully booked an appointment!");
    }
</script>

</body>
</html>