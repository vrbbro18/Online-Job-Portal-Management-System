<?php session_start(); ?>
<?php
require_once('inc/connection.php');
include_once('inc/header.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $jobTitle = $_POST["job_title"];
    $salary = $_POST["salary"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO job_list (job_title, salary, location, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $jobTitle, $salary, $location, $description);


    // Execute the statement
    if ($stmt->execute()) {
        echo "<div id='alertBox' class='alert success'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> Data saved successfully.
        </div>";
    } else {
        echo "<div id='alertBox' class='alert error'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> Data saved unsuccessfully.
        </div>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<link rel="stylesheet" href="./style/add_job.css">
<link rel="stylesheet" href="style/stylef.css">
<section>
    <div class="container">
        <form class="apply-form" method="post">
            <h2 class="j-title">Add job</h2>
            <div class="form-i-group">
                <label class="form-lable">Job Title*</label>
                <input type="text" name="job_title" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Salary*</label>
                <input type="number" name="salary" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Location*</label>
                <input type="text" name="location" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Description*</label>
                <input type="text" name="description" class="from-input" required>
            </div>
            <div class="btn-group">
                <button class="form-btn" type="submit">Submit</button>
                <button class="form-btn" type="button" id="reset" onclick="reloadPage()">Job List</button>
            </div>
        </form>
    </div>
</section>

<script>
    function reloadPage() {
        window.location.href = 'job_list_admin.php';
    }

    function showAlert() {
        document.getElementById("alertBox").style.display = "block";
    }

    function closeAlert() {
        document.getElementById("alertBox").style.display = "none";
    }
</script>

<?php include_once('inc/footer.php'); ?>