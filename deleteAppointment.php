<?php
    include "config.php";

    if(isset($_GET['appointment_id'])){
        $appointment_id = $_GET['appointment_id'];
        echo "appointment ID: " . $appointment_id; // Debugging code
        
        $sql = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
        $result = $conn->query($sql);
        
        if ($result && $conn->affected_rows > 0) {
            header('Location: appointments.php');
            exit;
        } else {
            echo "Error: Failed to delete the appointment.";
        }
    } else {
        echo "Error: Invalid appointment ID.";
    }
?>
