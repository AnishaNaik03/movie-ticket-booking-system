<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: index.php");
		die;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php if(count($errors) > 0):?>
	<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
	<!-- <h1>Login</h1>

	<?php include('header.php')?>

	<div>
		<div>
			

		</div>
			<form method="post">
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Password"><br>
			<br>
			<input type="submit" value="Login">
		</form>
				

		
	</div>
	-->
	<div class="wrapper" id=box>
        <form method="post">
			<center><img src="logo2.jpg" alt="logo" width= 140px height=110px></center>
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name= "password" placeholder="password" required>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="forgot">
                <a href="#">forgot password?</a>
            </div>

            <button type="submit" class="btn" value="Login">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
        </form>


    </div>

</body>
</html>