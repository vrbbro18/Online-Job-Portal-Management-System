<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php include_once('inc/header.php') ?>

<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
}
if ($_SESSION['role'] != 'admin') {
    header('Location: admin_login.php');
}
// Fetch job listings from the database
$query = "SELECT * FROM job_list";
$result = mysqli_query($conn, $query);

$query1 = "SELECT count(*) FROM job_list";
$job_list = mysqli_query($conn, $query1);
$query2 = "SELECT count(*) FROM job_applications";
$job_applications = mysqli_query($conn, $query2);
$query3 = "SELECT count(*) FROM user";
$user = mysqli_query($conn, $query3);

?>

<link rel="stylesheet" href="./style/job_list.css">
<link rel="stylesheet" href="style/stylef.css">
<section>
    <div class="container dashboard">
        <div class="box">
            <span class="number"><?php echo mysqli_fetch_assoc($job_list)['count(*)']; ?></span>
            <span class="text">Job Listings</span>

        </div>
        <div class="box">
            <span class="number"><?php echo mysqli_fetch_assoc($job_applications)['count(*)']; ?></span>
            <span class="text">Job Applications</span>
        </div>
        <div class="box">
            <span class="number"><?php echo mysqli_fetch_assoc($user)['count(*)']; ?></span>
            <span class="text">Users</span>
        </div>
    </div>
    <div class="container">

        <div class="job-title">
            <h2 class="j-title">Job Listings</h2>
            <div>
                <a href="admin_application_list.php" class="new-job-btn"> All Application</a>
                <a href="add_job.php" class="new-job-btn"> Add new job</a>
            </div>
        </div>
        <?php
        // Check if there are any job listings
        if (mysqli_num_rows($result) > 0) {
            // Display job listings
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $jobTitle = $row['job_title'];
                $salary = $row['salary'];
                $location = $row['location'];
                $description = $row['description'];

                echo "<div class='job-item'>";
                echo "<div class='job-header'>";
                echo "<h3 class='job-title'>$jobTitle</h3>";
                echo "<div class='job-btn'>";
                echo "<a href='./edit_job.php?id=$id' class='j-edit'>Edit</a>";
                echo "<a href='./delete_job.php?id=$id' class='j-delete'>Delete</a>";
                echo "</div>";
                echo "</div>";
                echo "<p class='job-salary'>Salary: $salary</p>";
                echo "<p class='job-location'>Location: $location</p>";
                echo "<p class='job-description'>$description</p>";
                echo "</div>";
            }
        } else {
            // No job listings found
            echo "<p>No job listings found.</p>";
        }

        // Free result set
        mysqli_free_result($result);

        // Close the connection
        mysqli_close($conn);
        ?>
    </div>
</section>

<?php include_once('inc/footer.php'); ?>