<?php
session_start();
include('config.php');



   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_type'] = $row['user_type'];

        if ($row['user_type'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
    } else {
        $error = "<p style='color: red;'>Invalid username or password!</p>";
    }
    }
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>User And Admin Login System </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .span{
        color: red;
    }
    .wrapper{
        width: 400px;
    }
    .container{
        margin-top: 100px;
    }
</style>
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
<div class="row g-3 align-items-center" >
    <div class="wrapper">
    <form class="row g-3" method="post" action="">
        <label>Username:</label>
        <input type="text" class="form-control" name="username" required><br>

        <label>Password:</label>
        <input type="password" class="form-control" name="password" required><br>

        <input type="submit" name="submit" class="btn btn-primary" value="Login">
    </form>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>