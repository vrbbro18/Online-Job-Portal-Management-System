<?php
session_start();
require_once('inc/connection.php');
include_once('inc/header.php');
?>

<link rel="stylesheet" href="style/HF.css">
<?php 

if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
}
if ($_SESSION['role'] != 'admin') {
    header('Location: admin_login.php');
}

// Retrieve all users
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

?>

<link rel="stylesheet" href="./style/user_list_admin.css">
<section>
    <div class="container">
        <div>
            <a href="add_user.php" class="action-btn">Add User</a>
        </div>
        <h2>All Users</h2>
        <div class="user-list-div">
            <table class="user-list">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include_once('footer.php'); ?>