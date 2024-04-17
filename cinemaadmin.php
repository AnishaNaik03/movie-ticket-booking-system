
<?php

require "functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="table.css">
  <title>home</title>
</head>

<body class="bg">
<?php if(check_admin(false)):?>
  <?php endif;?>
  
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="adminlogout.php">logout</a>
    <a href="moviesadmin.php">movies</a>
    <a href="cinemaadmin.php">Cinemas</a>
    <a href="addcinema.php">Addcinema</a>
    <a href="adminlogin.php">Admin</a>
  </div>

  <h2>CINEMAS<h2>
      <?php
      $name1 = new mysqli('localhost', 'root', '');
      $dbase_name = "verify_db";
      mysqli_select_db($name1, $dbase_name) or die(mysql_error());
      $query = " SELECT * FROM theater";
      $data = $name1->query($query);
      ?>
      <table>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th></th>
        </tr>
        
        <?php
        while ($info = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td> <?php echo $info['name']; ?></td>
            <td> <?php echo $info['address']; ?></td>
            <td> <?php echo $info['city']; ?></td>
            <td> <?php echo $info['state']; ?></td>
            <td><a href="deletecinema.php?id=<?php echo $info['t_id']; ?>">Delete</a></td>
          </tr>

          
        <?php
        }
        ?>
      </table>
</body>

</html>