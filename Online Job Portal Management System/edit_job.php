<?php
session_start();
require_once('inc/connection.php');
include_once('inc/header.php');


if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
}
if ($_SESSION['role'] != 'admin') {
    header('Location: admin_login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the job ID from the URL
    $id = $_GET['id'];

    // Fetch the job listing from the database
    $query = "SELECT * FROM job_list WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Job listing found, display the edit form
        $row = $result->fetch_assoc();
        $jobTitle = $row['job_title'];
        $salary = $row['salary'];
        $location = $row['location'];
        $description = $row['description'];

        // Close the result set
        $result->close();

        // Close the statement
        $stmt->close();
?>

        <link rel="stylesheet" href="./style/edit_job.css">
        <link rel="stylesheet" href="style/stylef.css">
        <section>
            <div class="container">
                <h2 class="j-title">Edit Job</h2>
                <form class="edit-form" method="post" action="update_job.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-i-group">
                        <label class="form-lable">Job Title*</label>
                        <input type="text" name="job_title" class="from-input" value="<?php echo $jobTitle; ?>" required>
                    </div>
                    <div class="form-i-group">
                        <label class="form-lable">Salary*</label>
                        <input type="text" name="salary" class="from-input" value="<?php echo $salary; ?>" required>
                    </div>
                    <div class="form-i-group">
                        <label class="form-lable">Location*</label>
                        <input type="text" name="location" class="from-input" value="<?php echo $location; ?>" required>
                    </div>
                    <div class="form-i-group">
                        <label class="form-lable">Description*</label>
                        <input type="text" name="description" class="from-input" value="<?php echo $description; ?>" required>
                    </div>
                    <div class="btn-group">
                        <button class="form-btn" type="submit">Update</button>
                        <button class="form-btn" type="button" id="cancel" onclick="goBack()">Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
<?php
    } else {
        // Job listing not found
        echo "Job listing not found.";
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}

include_once('inc/footer.php');
?>