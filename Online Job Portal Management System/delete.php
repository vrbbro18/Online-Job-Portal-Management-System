<?php
require_once('include/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the job ID from the URL
    $id = $_GET['gig_id'];

    // Prepare and bind the SQL statement
    $stmt = $connection->prepare("DELETE FROM creat_a_gig WHERE id = ?");
    $stmt->bind_param("i", $id);
    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful, redirect to the job list page
        header("Location: giglist.php");
        exit();
    } else {
        // Deletion unsuccessful, display an error message
        echo "Error deleting the job.";
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $connection->close();
}