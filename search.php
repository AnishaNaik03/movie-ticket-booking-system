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
<div class="upcoming">

        <div class="latest">

<?php 

            $name1 = new mysqli('localhost', 'root', '');
            $dbase_name = "verify_db";
            mysqli_select_db($name1, $dbase_name) or die(mysql_error());
            
            $query = " select DISTINCT movie_id,title,release_date,Genre,rating,duration,poster,cast1,cast2,cast3,director,trailer from movies where title='".$search."'";
            $data = $name1 -> query($query);
            while ($info = mysqli_fetch_array( $data ))
            {
			?>
 <img src="image/<?php echo $info['poster'];?>">
</div>
    <h1 style="color: #ffffff;"><?php echo $info['title'];?></h1><br>
    <a vlink=white href="<?php echo $info['trailer']; ?>" target="_blank">Watch Trailer</a>
    <h2 style="color: #ffffff;">Release Date:<?php echo $info['release_date'];?><br>
    Genre:<?php echo $info['Genre'];?><br>
    Cast:<br><?php echo $info['cast1'];?><br>
    <?php echo $info['cast2'];?><br>
    <?php echo $info['cast3'];?><br>
    Director:<br><?php echo $info['director'];?><br>
    Rating:<?php echo $info['rating'];?><br>
    Duration:<?php echo $info['duration'];?></h2>
    <a href="gis.php?id=<?php echo $info['movie_id'];?>"><input type="submit" value="Available Show"></a> 

					<?php
  	    	}
  	    	?>
</div>
</body>
</html>