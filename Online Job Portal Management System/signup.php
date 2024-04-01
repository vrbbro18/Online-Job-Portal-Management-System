<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('inc/header.php') ?>


<link rel="stylesheet" href="style/HF.css">
<?php

// Start the session
session_start();

// Check for form submission
if (isset($_POST['submit'])) {

    $errors = array();

    // Check if the username and password have been entered
    if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
        $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = 'Email is Missing / Invalid';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Password is Missing / Invalid';
    }

    // Check if there are any errors in the form
    if (empty($errors)) {
        // Save username, email, and password into variables
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare database query
        $query = "SELECT * FROM user 
                  WHERE email = '{$email}' 
                  LIMIT 1";

        $result_set = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 0) {
                // No existing user found with the same email, proceed to insert the new user
                $query = "INSERT INTO user (username, email, password) 
                          VALUES ('{$username}', '{$email}', '{$hashed_password}')";

                $result = mysqli_query($conn, $query);

                // Check if the query was successful
                if ($result) {
                    // Redirect to a success page or perform any other desired action
                    header('Location:login.php');
                    exit;
                } else {
                    $errors[] = 'Error creating the user.';
                }
            } else {
                $errors[] = 'Email already exists.';
            }
        } else {
            $errors[] = 'Database query failed.';
        }
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
                    <h1>Sign Up</h1>
                </legend>

                <?php
                if (isset($errors) && !empty($errors)) {
                    echo '<p class="error">Invalid Username / Password</p>';
                }
                ?>

                <?php
                if (isset($_GET['logout'])) {
                    echo '<p class="info">You have successfully logged out from the system</p>';
                }
                ?>

                <p>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username">
                </p>

                <p>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Email Address">
                </p>

                <p>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </p>

                <p>
                    <button type="submit" name="submit">Sign Up</button>
                </p>
                <p>
                    Already have an account? <a href="login.php">Log In</a>
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