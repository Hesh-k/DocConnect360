<?php
include "config.php";

$appointment_id = "";
$name = "";
$date = "";
$number = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['appointment_id'])) {
        header("location:appointments.php");
        exit;
    }
    $appointment_id = $_GET['appointment_id'];
    $sql = "SELECT * FROM appointments WHERE appointment_id = $appointment_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $name = $row["doctorName"];
        $date = $row["day"];
        $number = $row["number"];
    } else {
        header("location:appointments.php");
        exit;
    }
} else {
    $appointment_id = $_POST["appointment_id"];
    $name = $_POST["DoctorName"];
    $date = $_POST["date"];
    $number = $_POST["Number"];

    $sql = "UPDATE appointments SET doctorName='$name', `day`='$date', number='$number' WHERE appointment_id='$appointment_id'";
    $result = $conn->query($sql);

    if ($result) {
        $success = "Appointment rescheduled successfully.";
    } else {
        $error = "Failed to reschedule appointment. Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reschedule Appointment</title>
    <link rel='stylesheet' href="styles/editAppointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="form">
        <form method="POST" action="editAppointment.php">
            <h2>Reschedule</h2>
            <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="appointments.php">&nbsp;View Appointments</a></button>
            <div class="input-container ic2">
                <input type="text" class="input" name="DoctorName" placeholder="Doctor's Name" value="<?php echo $name; ?>" required>
                <div class="cut"></div>
            </div>
            <div class="input-container ic2">
                <input type="date" class="input" name="date" id="date" value="<?php echo $date; ?>" required>
                <div class="cut"></div>
            </div>
            <div class="input-container ic2">
                <input type="text" class="input" name="Number" placeholder="Phone Number" value="<?php echo $number; ?>" required>
                <div class="cut cut-short"></div>
            </div>
            <div>
                <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                <input type="submit" class="submit" value="Confirm Appointment" onclick="showAlert()">
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function showAlert() {
            alert("Success!");
        }
    </script>
</body>
</html>
