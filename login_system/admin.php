<?php
session_start();

if ($_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
}

// Admin-specific functionality and HTML content here
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style type="text/css">
      table, th, td {
  border: 1px solid;
}
    </style>
</head>
<body>
    <h2 style="color:red;">Welcome, Admin!</h2>
    <p>This is the Total Users</p>
   <table class="table" >
      <thead class="thead-light">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
      </tr>
      </thead>
      <tbody>
      <?Php
        require "config.php";// Database connection file.

        $query="select * from login LIMIT 0,5 ";
        if ($result_set = mysqli_query($conn,$query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
          </tr>

       <?php }

         $result_set->close();
        }
?>
      </tbody> 
        </table> 
    <a href="logout.php">Logout</a>

</body>
</html>