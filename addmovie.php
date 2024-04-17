<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	addm($_POST);

		header("Location:adminindex.php");
		die;

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
     <link rel="stylesheet" href="style.css"> 
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<title>admin</title>
</head>
<body>
<?php if(check_admin(false)):?>
	<?php endif;?>
        <form method="post" class="wrapper">
            <h1>Movie</h1>
            <div class="input-box">
                <input type="text" name="title" placeholder="title" required>
            </div>
            <div class="input-box">
                <input type="date" name= "Release" placeholder="Release date" required>
            </div>
            <div class="input-box">
                <input type="text" name= "Genre" placeholder="Genre" required>
            </div><div class="input-box">
                <input type="text" name= "Description" placeholder="Description" required>
            </div><div class="input-box">
                <input type="text" name= "cast1" placeholder="cast1" required>
            </div>
            </div><div class="input-box">
                <input type="text" name= "cast2" placeholder="cast2" required>
            </div>
            </div><div class="input-box">
                <input type="text" name= "cast3" placeholder="cast3" required>
            </div>
            </div><div class="input-box">
                <input type="text" name= "Director" placeholder="Director" required>
            </div>
            <div class="input-box">
                <input type="text" name= "Duration" placeholder="Duration" required>
            </div>
            <div class="input-box">
                <input type="number" name= "ratings" placeholder="ratings" required>
            </div><div class="input-box">
                <input type="text" name= "Trailer" placeholder="Trailer" required>
            </div><div class="input-box">
                <input type="text" name= "Poster" placeholder="Poster" required>
            </div>
            </div><div class="input-box">
                <input type="number" name= "t_id" placeholder="theater id" required>
            </div>
            <button type="submit" class="btn" value="Add">Add</button>
</form>
</body>
</html>