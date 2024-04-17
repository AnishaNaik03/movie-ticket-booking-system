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
	$query = "select * from movies where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
	$info = mysqli_fetch_array( $data )
?>
<div class="upcoming" >
<div class="latest">
 <img src="image/<?php echo $info['poster'];?>" height=400px>
</div>
    <h1 style="color: #ffffff;"><strong><?php echo $info['title'];?></strong></h1><br>
    <a href="<?php echo $info['trailer']; ?>" target="_blank"><font color=white>Watch Trailer</a>
    <h2 style="color: #ffffff;">Release Date:<?php echo $info['release_date'];?></h1><br>
    <h2>Genre:<?php echo $info['Genre'];?></h2><br>
	<h2>Description:<br><?php echo $info['description'];?></h2><br>
    <h2>Cast:<br><?php echo $info['cast1'];?></h2><br>
    <h2><?php echo $info['cast2'];?></h2><br>
    <h2><?php echo $info['cast3'];?></h2><br>
    <h2>Director:<br><?php echo $info['director'];?></h2><br>
    <h2>Rating:<?php echo $info['rating'];?></h2>
    <h2>Duration:<?php echo $info['duration'];?></h2>
	<a href="gis.php?id=<?php echo $info['movie_id'];?>"><input type="submit" value="Available Show"></a> 
</div>
</body>
</html>