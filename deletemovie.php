<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<title>admin</title>
</head>
<body>
	
<?php 
	$name1 = new mysqli('localhost', 'root', '');
	$dbase_name = "verify_db";
	mysqli_select_db($name1, $dbase_name) or die(mysql_error());
	$query = "DELETE FROM `movies`  where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
	header("Location:adminindex.php");
	die;
?>