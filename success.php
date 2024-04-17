z<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location:profile.php");
		die;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>registration</title>
	<link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php if(count($errors) > 0):?>
	<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
			<br><h3><font color=green>Registration is successful!!....Now verify Email</font></h3><br>
	<div class="wrapper" id=box>
        <form method="post">
			<center><div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span></center>
            <h1>Register</h1>
			<h2>RENTER YOUR EMAIL AND PASSWORD FOR VERIFICATION<h2>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name= "password" placeholder="password" required>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <button type="submit" class="btn" value="confirm">confirm</button>
        </form>
    </div>

</body>
</html>