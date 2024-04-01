<?php
require_once('inc/connection.php');
include_once('inc/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $jobTitle = $_POST["job_title"];
    $salary = $_POST["salary"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE job_list SET job_title = ?, salary = ?, location = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $jobTitle, $salary, $location, $description, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: job_list_admin.php");
        exit();
    } else {
        echo "Error deleting the job.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

<?php include_once('inc/footer.php') ?>
