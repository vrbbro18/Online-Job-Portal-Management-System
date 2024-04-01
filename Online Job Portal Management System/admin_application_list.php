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

// Retrieve all job applications with user data
$query = "SELECT ja.*, jl.job_title, jl.salary, jl.location, jl.description, u.username, u.email AS user_email
          FROM job_applications ja
          JOIN job_list jl ON ja.job_id = jl.id
          JOIN user u ON ja.user_id = u.id";
$result = mysqli_query($conn, $query);

?>

<link rel="stylesheet" href="./style/admin_application_list.css">
<link rel="stylesheet" href="style/stylef.css">
<section>
    <div class="container">
        <div>
            <a href="job_list_admin.php" class="action-btn">Job Listings</a>
        </div>
        <h2>All Job Applications</h2>
        <div class="job-list-div">
            <table class="job-list">
                <thead>
                    <tr>
                        <th>Application No</th>
                        <th>Job Title</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Skills</th>
                        <th>Working Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['job_title']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['skills']; ?></td>
                            <td><?php echo $row['working_hours']; ?></td>
                            <td>
                                <a href="view_application.php?id=<?php echo $row['id']; ?>" class="action-btn">View</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include_once('inc/footer.php'); ?>