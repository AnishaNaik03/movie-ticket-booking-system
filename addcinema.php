<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	addc($_POST);

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
 <div class="wrapper" id=box> 
        <form method="post">
            <h1>Cinemas</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="name" required>
            </div>
            <div class="input-box">
                <input type="text" name= "address" placeholder="address" required>
            </div>
            <div class="input-box">
                <input type="text" name= "city" placeholder="city" required>
            </div><div class="input-box">
                <input type="text" name= "state" placeholder="state" required>
</div>
            <button type="submit" class="btn" value="Add">Add</button>
        </form>
    </div> 
</body>
</html>