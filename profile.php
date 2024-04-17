<?php

	require "functions.php";
	//check_login();
	extract($_POST);
	$errors = array();
	// $e=$_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>Profile</title>
</head>
<body>
	<div class="wrapper" id="box">
	<center><div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span></center>
	<?php if(check_login(false)):?>
		<br><br>
		<h2><font color=white>Profile Details</font></h2>
		<br><br>
		<font color="white">Username: <?=$_SESSION['USER']->username?>;</font><br>
		<font color="white">Email: <?=$_SESSION['USER']->email?>;</font>
		<?php if(!check_verified()):?>
            <a href="verify.php">
                <button>Verify Email</button>
            </a>      
    	<?php endif;?>
		<br>
		 <font color="white">Phone: <?=$_SESSION['USER']->phone?>;</font>	
		
	<?php endif;?>
		</div>
</body>
</html>