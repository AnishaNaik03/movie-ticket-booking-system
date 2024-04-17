
<?php

	require "mail.php";
	require "functions.php";
	extract($_POST);
	$errors = array();

		$e=$_GET['email'];
		if($_SERVER['REQUEST_METHOD'] == "GET"){
		$vars['code'] =  rand(10000,99999);
		$vars['expires'] = (time() + (60 * 10));
		$vars['email'] =$e;

		$query = "insert into verify (code,expires,email) values (:code,:expires,:email)";
		database_run($query,$vars);

		$message = "Your code for email verification is : " . $vars['code'];
		$subject = "RESET PASSWORD";
		$recipient = $vars['email'];
		send_mail($recipient,$subject,$message);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		// if(!check_verified()){

			$query = "select * from verify where code = :code && email = :email";
			$vars = array();
			//$vars['email'] = $_SESSION['USER']->email;
			$vars['email'] = $e;
			$vars['code'] = $_POST['code'];

			$row = database_run($query,$vars);

			if(is_array($row)){
				$row = $row[0];
				$time = time();

				if($row->expires > $time){

					$id =$info['id'];
					$query="UPDATE users SET password = NULL WHERE email = '$e' limit 1";
					//$query="DELETE FROM users WHERE  email = '$e' limit 1";
					database_run($query);
			
					header("Location: reset_password.php");
					die;
				}else{
					
					echo "<font color=white>code expired</font>";
				}

			}else{
				echo "<font color=white>wrong code</font>";
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verify</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	

	<div class="wrapper" id="box">
	<h1><font color=white>VERIFY</font></h1>
			<p><font colour=white>Enter code sent on your email</font></p>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>

		</div>
		<form method="post">
			<input class=input-box type="text" name="code" placeholder="Enter your Code"><br>
 			<br>
			<input class="btn" type="submit" value="Verify">
		</form>
		
	</div>
</body>
</html>