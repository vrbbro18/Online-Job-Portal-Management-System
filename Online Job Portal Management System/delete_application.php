<?php
session_start();
require_once('inc/connection.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $applicationId = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Prepare and bind the SQL statement to delete the job application
    $stmt = $conn->prepare("DELETE FROM job_applications WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $applicationId, $user_id);

    if ($stmt->execute()) {
        // Redirect back to the My Job List page after successful deletion
        header("Location: my_application.php");
        exit();
    } else {
        // Display an error message if deletion fails
        echo "<div id='alertBox' class='alert error'>
                <span class='closebtn' onclick='closeAlert()'>&times;</span>
                <strong>Alert!</strong> Failed to delete the job application.
            </div>";
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
