<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = signup($_POST);

	if(count($errors) == 0)
	{
		header("Location:success.php");
		die;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
	
				<div class="wrapper" id=box>
        <form method="post">
        <center><div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span></center>
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box">
                <input type="text" name= "email" placeholder="Email" required>
            </div>
           <div class="input-box">
                <input type="text" name= "phone" placeholder="phone" required>
            </div>
			<div>
            <label for="Age group">Age group:</label>

                    <select name="Age group">
                    <option value="18 &above">18 &above</option>
                    <option value="15-18">15-18</option>
                    </select>
            </div>
            <div class="input-box">
                <input type="password" name= "password" placeholder="Password" required>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="input-box">
                <input type="password" name= "password2" placeholder="confirm Password" required>
                <i class='bx bx-lock-alt' ></i>
            </div>
			<button type="submit" class="btn" value="Login">Register</button> 
            <div class="register-link">
                <p>already have account<a href="login.php">login</a></p>
            </div>
        </form>
    </div>
</body>
</html>