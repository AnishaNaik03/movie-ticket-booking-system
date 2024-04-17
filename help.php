<?php

	require "functions.php";
	check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>Profile</title>
</head>
<body>

	
	<!-- <?php include('header.php');?> -->
	<div class="wrapper" id="box">
	<h1><font color=white>Movie Tickets</font></h1>
	<?php if(check_login(false)):?>
		<br><br>
		<h1><font color=green>Help</font></h1><br>
        <h3><font color=white>you can share your doubts with us we will try to help you out as soon as possible</font></h3><br>
		<h4><font color=white>contact number:-8390347249</font></h4><br>
        <h4><font color=white>email address:-themovietickets@gmail.com</font></h4><br>
	<?php endif;?>
		</div>
</body>
</html>