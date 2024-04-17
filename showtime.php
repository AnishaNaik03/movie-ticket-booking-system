<?php

	require "functions.php";
	check_login();
	extract($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cssfile.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<title>search</title>
</head>
<body>
<?php include('header.php')?>
<?php 
	
	$name1 = new mysqli('localhost', 'root', '');
	$dbase_name = "verify_db";
	mysqli_select_db($name1, $dbase_name) or die(mysql_error());
	$query = "select * from cinemas where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
	$info = mysqli_fetch_array( $data )
?>
