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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div id='alertBox' class='alert success'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> User added successfully.
        </div>";
    } else {
        echo "<div id='alertBox' class='alert error'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> Failed to add user.
        </div>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<link rel="stylesheet" href="./style/add_user.css">
<section>
    <div class="container">
        <form class="apply-form" method="post">
            <h2 class="j-title">Add User</h2>
            <div class="form-i-group">
                <label class="form-lable">Username*</label>
                <input type="text" name="username" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Email*</label>
                <input type="email" name="email" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Password*</label>
                <input type="password" name="password" class="from-input" required>
            </div>
            <div class="form-i-group">
                <label class="form-lable">Role*</label>
                <select name="role" class="from-input" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="btn-group">
                <button class="form-btn" type="submit">Submit</button>
                <button class="form-btn" type="button" id="reset" onclick="reloadPage()">User List</button>
            </div>
        </form>
    </div>
</section>

<script>
    function reloadPage() {
        window.location.href = 'user_list_admin.php';
    }

    function showAlert() {
        document.getElementById("alertBox").style.display = "block";
    }

    function closeAlert() {
        document.getElementById("alertBox").style.display = "none";
    }
</script>

<?php include_once('inc/footer.php'); ?>