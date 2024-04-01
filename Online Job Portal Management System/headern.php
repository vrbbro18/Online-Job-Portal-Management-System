<?php
session_start();
require_once('inc/connection.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Header and footer</title>
    <link rel="stylesheet" href="style/stylef.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>

<body>

    </div>

    <nav class="h-nav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ATJ.COM</label>
        <ul>
            <li><a href="admin_login.php">Admin</a></li>
            <li><a href="login.php">User</a></li>
            <li><a href="user_list_admin.php">Employer</a></li>
            <li><a href="logout.php">LogOut</a></li>
        </ul>

        
    </nav>
</section>
</body>
</html>
