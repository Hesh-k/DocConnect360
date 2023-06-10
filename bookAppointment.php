
<!DOCTYPE html>
<html >
<head>
    <title>Book Appoinment</title>
    <link rel='stylesheet' href="styles/bookAppointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="form">
        <form  method ="POST" action="appointmentData.php">
            <h2>Book Appointment</h2>
            <button id="back-btn"><i class="fa-sharp fa-solid fa-arrow-left"></i><a href="appointments.php">&nbsp;View Appointments</a></button>
            <div class="input-container ic2">
            <input type="text" class="input" name = "DoctorName" placeholder="Doctor's Name" required>
            <div class="cut"></div>
            </div>
            <div class="input-container ic2">
            <input type="date" class="input" name="date" id="date" required>
            <div class="cut"></div>
            </div>
            <div class="input-container ic2">
            <input type="text" class="input" name = "Number" placeholder="Phone Number" required>
            <div class="cut cut-short"></div>    
            </div >
            <div>
            <input type="submit" class="submit" value="Confirm Appoinment" onclick="showAlert()">
            </div>    
        </form>
    </div>
    <script type="text/javascript">
        function showAlert() {
            alert("You have Sucssessfuly Book An Appointment!");
        }
    </script>
</body>
</html>