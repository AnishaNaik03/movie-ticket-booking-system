<?php

session_start();

function register($data)
{
	$error = array();

	if (strlen(trim($data['password'])) < 4) {
		echo "<font color=white>Password must be atleast 4 chars long\r\n</font>";
		$error[] = ".";
	}

	if ($data['password'] != $data['password2']) {
		echo "<font color=white>Passwords must match\r\n</font>";

		$error[] = ".";
	}
	if (count($error) == 0) {

		// $arr['username'] = $data['username'];
		$arr['email'] = $data['email'];
		$e = $data['email'];
		// $arr['phone'] = $data['phone'];
		$arr['password'] = hash('sha256', $data['password']);
		$p = hash('sha256', $data['password']);
		$arr['date'] = date("Y-m-d H:i:s");
		$d = date("Y-m-d H:i:s");

		// $query = "insert into users (password,date) values; 
		// (:password,:date) where email=:email";
		$query = "UPDATE users SET password ='$p',date='$d' WHERE email = '$e' limit 1";

		database_run($query);
	}
	return $error;
}

function signup($data)
{
	$errors = array();

	//validate 
	if (!preg_match('/^[a-zA-Z]+$/', $data['username'])) {
		echo "<font color=white>Please enter a valid username\r\n</font>";
		// $errors[] = "Please enter a valid username";
		$errors[] = ".";
	}

	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		echo "<font color=white>Please enter a valid email\r\n</font>";
		// $errors[] = "Please enter a valid email";
		$errors[] = ".";
	}

	if (strlen(trim($data['phone'])) < 10) {
		echo "<font color=white>Enter a valid phone number\r\n</font>";
		// $errors[] = "Enter a valid phone number";
		$errors[] = ".";
	}

	if (strlen(trim($data['password'])) < 4) {
		echo "<font color=white>Password must be atleast 4 chars long\r\n</font>";
		// $errors[] = "Password must be atleast 4 characters long";
		$errors[] = ".";
	}

	if ($data['password'] != $data['password2']) {
		echo "<font color=white>Passwords must match\r\n</font>";
		// $errors[] = "Passwords must match";
		$errors[] = ".";
	}

	$check = database_run("select * from users where email = :email limit 1", ['email' => $data['email']]);
	if (is_array($check)) {
		echo "<font color=white>That email already exists\r\n<br></font>";
		// $errors[] = "That email already exists";
		$errors[] = ".";
	}
	if (count($errors) == 0) {

		$arr['username'] = $data['username'];
		$arr['email'] = $data['email'];
		$arr['phone'] = $data['phone'];
		$arr['password'] = hash('sha256', $data['password']);
		$arr['date'] = date("Y-m-d H:i:s");

		$query = "insert into users (username,email,phone,password,date) values 
		(:username,:email,:phone,:password,:date)";

		database_run($query, $arr);
	}
	return $errors;
}

function login($data)
{
	$errors = array();

	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email\r\n";
	}

	if (strlen(trim($data['password'])) < 4) {
		$errors[] = "Password must be atleast 4 chars long\r\n";
	}

	if (count($errors) == 0) {

		$arr['email'] = $data['email'];
		$password = hash('sha256', $data['password']);

		$query = "select * from users where email = :email limit 1";

		$row = database_run($query, $arr);

		if (is_array($row)) {
			$row = $row[0];

			if ($password === $row->password) {

				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			} else {
				echo "<font color=white>wrong email or password\r\n<br></font>";
				// $errors[] = "wrong email or password";
				$errors[] = ".";
			}
		} else {
			echo "<font color=white>wrong email or password\r\n</font>";
			// $errors[] = "wrong email or password";
			$errors[] = ".";
		}
	}
	return $errors;
}

function database_run($query, $vars = array())
{
	$string = "mysql:host=localhost;dbname=verify_db";
	$con = new PDO($string, 'root', '');

	if (!$con) {
		return false;
	}

	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if ($check) {

		$data = $stm->fetchAll(PDO::FETCH_OBJ);

		if (count($data) > 0) {
			return $data;
		}
	}

	return false;
}

function check_login($redirect = true)
{
	if (isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])) {

		return true;
	}

	if ($redirect) {
		header("Location: login.php");
		die;
	} else {
		return false;
	}
}

function check_verified()
{

	$id = $_SESSION['USER']->id;
	$query = "select * from users where id = '$id' limit 1";
	$row = database_run($query);

	if (is_array($row)) {
		$row = $row[0];

		if ($row->email == $row->email_verified) {

			return true;
		}
	}

	return false;
}
function bookin($data)
{
	$arr['user_id'] = $_SESSION['USER']->id;
	$arr['movie_id'] = $_GET['id4'];
	$arr['t_id'] = $_GET['id1'];
	$arr['screen_id'] = $_GET['id2'];
	$arr['date_of_show'] = $data['date'];
	$arr['st_id'] = $_GET['id3'];
	$arr['number_of_tickets'] = $data['no_ticket'];
	$arr['booking_details'] = $data['seat_dt'];
	$arr['price']=$data['price_details'];


	$query = "INSERT INTO `booking`(`user_id`, `movie_id`, `t_id`,`screen_id`, `date_of_show`, `st_id`, `number_of_tickets`, `booking_details`, `booking_status`,`price`)  values 
		(:user_id,:movie_id,:t_id,:screen_id,:date_of_show,:st_id,:number_of_tickets,:booking_details,'booked',:price)";

	database_run($query, $arr);
}

function admin($data)
{
	$errors = array();

	// if (!filter_var($data['nam'], FILTER_VALIDATE_EMAIL)) {
	// 	$errors[] = "Please enter a valid email\r\n";
	// }

	if (strlen(trim($data['password'])) < 4) {
		$errors[] = "Password must be atleast 4 chars long\r\n";
	}

	if (count($errors) == 0) {

		$arr['name'] = $data['name'];
		$password = $data['password'];

		$query = "select * from admin where name = :name limit 1";

		$row = database_run($query, $arr);

		if (is_array($row)) {
			$row = $row[0];

			if ($password === $row->password) {

				$_SESSION['admin'] = $row;
				$_SESSION['admin_logged'] = true;
			} else {
				echo "<font color=white>wrong name or password\r\n<br></font>";
				// $errors[] = "wrong email or password";
				$errors[] = ".";
			}
		} else {
			echo "<font color=white>wrong name or password\r\n</font>";
			// $errors[] = "wrong email or password";
			$errors[] = ".";
		}
	}
	return $errors;
}

function check_admin($redirect = true)
{
	if (isset($_SESSION['admin']) && isset($_SESSION['admin_logged'])) {

		return true;
	}

	if ($redirect) {
		header("Location: index.php");
		die;
	} else {
		return false;
	}
}

function addm($data)
{


		$arr['title'] = $data['title'];
		$arr['release_date'] = $data['Release'];
		$arr['Genre'] = $data['Genre'];
		$arr['description'] = $data['Description'];
		$arr['cast1'] =$data['cast1'];
		$arr['cast2'] =$data['cast2'];
		$arr['cast3'] =$data['cast3'];
		$arr['director'] =$data['Director'];
		$arr['duration'] =$data['Duration'];
		$arr['rating'] =$data['ratings'];
		$arr['trailer'] =$data['Trailer'];
		$arr['poster'] =$data['Poster'];
		$arr['t_id'] =$data['t_id'];

		$query = "INSERT INTO `movies`(title, `release_date`, `Genre`, `description`, `cast1`, `cast2`, `cast3`, `director`, `duration`, `rating`, `trailer`, `poster`, `t_id`) 
		VALUES (:title,:release_date,:Genre,:description,:cast1,:cast2,:cast3,:director,:duration,:rating,:trailer,:poster,:t_id)";
		database_run($query, $arr);
	}

	function addc($data)
{
		$arr['name'] = $data['name'];
		$arr['address'] = $data['address'];
		$arr['city'] = $data['city'];
		$arr['state'] =$data['state'];

		$query = "INSERT INTO `theater`(`name`, `address`, `city`, `state`) VALUES (:name,:address,:city,:state)";
		database_run($query, $arr);
	}
