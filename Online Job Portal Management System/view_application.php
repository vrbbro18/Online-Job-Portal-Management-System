<?php
session_start();
require_once('inc/connection.php');
include_once('header.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Check if the application ID is provided in the URL
if (!isset($_GET['id'])) {
    header('Location: admin_application_list.php');
}

$application_id = $_GET['id'];

// Retrieve the job application data
$query = "SELECT ja.*, jl.job_title, jl.salary, jl.location, jl.description, u.username, u.email AS user_email
          FROM job_applications ja
          JOIN job_list jl ON ja.job_id = jl.id
          JOIN user u ON ja.user_id = u.id
          WHERE ja.id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $application_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the job application details
$row = mysqli_fetch_assoc($result);

// Check if the job application exists
if (!$row) {
    header('Location: admin_application_list.php');
}

?>

<link rel="stylesheet" href="./style/view_application.css">
<section>
    <div class="container">
        <div>
            <a href="admin_application_list.php" class="back-btn">Back</a>
        </div>
        <h2>Job Application Details</h2>
        <table class="application-details">
            <tr>
                <th>Application No:</th>
                <td><?php echo $row['id']; ?></td>
            </tr>
            <tr>
                <th>Job Title:</th>
                <td><?php echo $row['job_title']; ?></td>
            </tr>
            <tr>
                <th>User Name:</th>
                <td><?php echo $row['username']; ?></td>
            </tr>
            <tr>
                <th>User Email:</th>
                <td><?php echo $row['user_email']; ?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <th>Skills:</th>
                <td><?php echo $row['skills']; ?></td>
            </tr>
            <tr>
                <th>Working Hours:</th>
                <td><?php echo $row['working_hours']; ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
                <th>Contract:</th>
                <td><?php echo $row['contract']; ?></td>
            </tr>
        </table>
        <div class="description">
            <h3>Job Description</h3>
            <p><?php echo $row['description']; ?></p>
        </div>

    </div>
</section>
<?php include_once('footer.php'); ?>