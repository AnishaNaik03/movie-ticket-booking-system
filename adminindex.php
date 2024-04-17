<?php

	require "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="cssfile.css">
    <link rel="stylesheet" href="header.css">
</head>
<body>
<?php if(check_admin(false)):?>
	<?php endif;?>
    <div class="bg" align="center">
<div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span>
    <div class="topnav">
  <a  href="index.php">Home</a>
  <a  href="login.php">Login</a>
  <a  href="adminlogout.php">logout</a>
  <a  href="moviesadmin.php">movies</a>
  <a  href="cinemaadmin.php">Cinemas</a> 
  <a  href="adminlogin.php">Admin</a> 
</div>
<h2><font color=" #81abe6">WELCOME <?=$_SESSION['admin']->name?>;</font></h2>

</body>
</html>