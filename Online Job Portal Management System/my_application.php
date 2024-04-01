<?php
session_start();
require_once('inc/connection.php');
include_once('inc/header.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user_id'];

// Retrieve the user's job applications
$query = "SELECT ja.*, jl.job_title, jl.salary, jl.location, jl.description
          FROM job_applications ja
          JOIN job_list jl ON ja.job_id = jl.id
          WHERE ja.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<link rel="stylesheet" href="./style/my_application.css">
<link rel="stylesheet" href="style/stylef.css">
<section>
    <div class="container">
        <button class="form-btn" type="button" id="reset" onclick="reloadPage()">Back</button>
        <h2>My Job List</h2>
        <div class="job-div">
            <table class="job-list">
                <thead>
                    <tr>
                        <th>Application No</th>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Location</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your job list data and generate table rows dynamically -->
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['job_title']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><a href='./edit_application.php?id=<?php echo $row['id']; ?>' class='j-edit'>Edit</a></td>
                            <td><a href='./delete_application.php?id=<?php echo $row['id']; ?>' class='j-delete'>Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<script>
    function reloadPage() {
        window.location.href = 'job_list.php'
    }
</script>
<?php include_once('inc/footer.php'); ?>