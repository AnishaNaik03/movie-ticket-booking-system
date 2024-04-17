<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	header("Location:forgot_verify.php");
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
	<div class="wrapper" id=box>
        <form action="forgot_verify.php" method="Get">
			<center><div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span></center>
            <h1>forgot password</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-user' ></i>
            <button type="submit" class="btn" value="confirm">confirm</button>
        </form>
    </div>

</body>
</html>