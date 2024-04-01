<?php
require_once('inc/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the job ID from the URL
    $id = $_GET['id'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("DELETE FROM job_list WHERE id = ?");
    $stmt->bind_param("i", $id);
    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful, redirect to the job list page
        header("Location: job_list_admin.php");
        exit();
    } else {
        // Deletion unsuccessful, display an error message
        echo "Error deleting the job.";
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
