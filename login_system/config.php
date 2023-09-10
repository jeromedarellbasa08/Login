<?php
$conn =  mysqli_connect("localhost","root","","loginsystem");
// Check if the connection was successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>