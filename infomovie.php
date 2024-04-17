<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<title>search</title>
</head>
<body>
	
<?php 
	
	$name1 = new mysqli('localhost', 'root', '');
	$dbase_name = "verify_db";
	mysqli_select_db($name1, $dbase_name) or die(mysql_error());
	$query = "select * from movies where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
	$info = mysqli_fetch_array( $data )
    
?>
<h1><strong><?php echo $info['title'];?></strong></h1><br>
    <a href="<?php echo $info['trailer']; ?>" target="_blank">Watch Trailer</a>
    <h2>Release Date:<?php echo $info['release_date'];?></h1><br>
    <h2>Genre:<?php echo $info['Genre'];?></h2><br>
	<h2>Description:<br><?php echo $info['description'];?></h2><br>
    <h2>Cast:<br><?php echo $info['cast1'];?></h2><br>
    <h2><?php echo $info['cast2'];?></h2><br>
    <h2><?php echo $info['cast3'];?></h2><br>
    <h2>Director:<br><?php echo $info['director'];?></h2><br>
    <h2>Rating:<?php echo $info['rating'];?></h2>
    <h2>Duration:<?php echo $info['duration'];?></h2>
</body>
</html>