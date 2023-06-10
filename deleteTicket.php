<?php
    include "config.php";

    if(isset($_GET['ticket_id'])){
        $ticket_id = $_GET['ticket_id'];
        echo "Ticket ID: " . $ticket_id; // Debugging code
        
        $sql = "DELETE FROM tickets WHERE ticket_id = $ticket_id";
        $result = $conn->query($sql);
        
        if ($result && $conn->affected_rows > 0) {
            header('Location: tickets.php');
            exit;
        } else {
            echo "Error: Failed to delete the ticket.";
        }
    } else {
        echo "Error: Invalid ticket ID.";
    }
?>
