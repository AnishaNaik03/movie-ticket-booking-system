<?php
session_start();

if(isset($_SESSION['admin'])){
	unset($_SESSION['admin']);
}

if(isset($_SESSION['admin_logged'])){
	unset($_SESSION['admin_logged']);
}

header("Location: index.php");
die;

