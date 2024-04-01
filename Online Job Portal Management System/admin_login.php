<?php
require_once('inc/connection.php');
require_once('inc/functions.php');
include_once('inc/header.php');
?>

<link rel="stylesheet" href="style/HF.css">

<?php  
session_start();
// if (isset($_SESSION['user_id'])) {
//     header('Location: job_list.php');
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    // Check if the email and password have been entered
    if (empty(trim($_POST['email']))) {
        $errors[] = 'Username is Missing / Invalid';
    }

    if (empty(trim($_POST['password']))) {
        $errors[] = 'Password is Missing / Invalid';
    }

    // Proceed with login if there are no errors
    if (empty($errors)) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = trim($_POST['password']);

        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $hashed_password = $user['password'];

            if (password_verify($password, $hashed_password) && $user['role'] == 'admin') {

                if ($user['username'] == 'admin') {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['username'] = $user['username'];

                    header('Location: job_list_admin.php');
                    exit;
                } else {
                    $errors[] = 'Invalid Username / Password';
                }
            } else {
                $errors[] = 'Invalid Username / Password';
            }
        } else {
            $errors[] = 'Invalid Username / Password';
        }

        $stmt->close();
    }
}
?>

<style>
    .login {
        width: 600px;
        margin: 40px auto;
        background-color: #23383c;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #fff;
    }

    .login p {
        margin-bottom: 15px;
    }

    .login label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .login input[type="text"],
    .login input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
        color: #111111;
    }

    .login button[type="submit"] {
        background-color: #1b9bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .login button[type="submit"]:hover {
        background-color: #1a73b6;
    }

    .login .error {
        color: #c0392b;
    }

    .login .info {
        color: #3498db;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    fieldset {
        padding: 30px
    }
</style>

<section>
    <div class="login">
        <form method="post">
            <fieldset>
                <legend>
                    <h1>Log In</h1>
                </legend>

                <?php if (!empty($errors)) : ?>
                    <p class="error">Invalid Username / Password</p>
                <?php endif; ?>

                <?php if (isset($_GET['logout'])) : ?>
                    <p class="info">You have successfully logged out from the system</p>
                <?php endif; ?>

                <p>
                    <label for="email">Username:</label>
                    <input type="text" name="email" id="email" placeholder="Email Address">
                </p>

                <p>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </p>

                <p>
                    <button type="submit" name="submit"><a href ="jobseekerprofile.php">Log In</button></a>
                </p>
            </fieldset>
        </form>
    </div>
</section>

<script>
    function reloadPage() {
        location.reload();
    }

    function showAlert() {
        document.getElementById("alertBox").style.display = "block";
    }

    function closeAlert() {
        document.getElementById("alertBox").style.display = "none";
    }
</script>

<?php include_once('inc/footer.php') ?>