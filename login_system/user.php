<?php
session_start();

if ($_SESSION['user_type'] != 'user') {
    header("Location: login.php");
}

// User-specific functionality and HTML content here
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2 style="color:red;">Welcome, User!</h2>
    <p>This is the Dashbord of user</p>
    <a href="logout.php">Logout</a>
</body>
</html>