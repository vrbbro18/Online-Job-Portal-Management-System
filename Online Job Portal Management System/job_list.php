<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php include_once('inc/header.php') ?>

<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Fetch job listings from the database
$query = "SELECT * FROM job_list";
$result = mysqli_query($conn, $query);

?>

<link rel="stylesheet" href="./style/job_list.css">
<link rel="stylesheet" href="style/stylef.css">
<section>
    <div class="container">
        <div class="job-title">
            <h2 class="j-title">Job Listings</h2>
            <a href="my_application.php" class="new-job-btn"> My Application</a>
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

                echo "<a href='add_application.php?id=$id' >";
                echo "<div class='job-item'>";
                echo "<div class='job-header'>";
                echo "<h3 class='job-title'>$jobTitle</h3>";
                echo "<div class='job-btn'>";
                echo "</div>";
                echo "</div>";
                echo "<p class='job-salary'>Salary: $salary</p>";
                echo "<p class='job-location'>Location: $location</p>";
                echo "<p class='job-description'>$description</p>";
                echo "</div>";
                echo "</a>";
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