<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

Use Carneiro\Login\Login;

$email = stripslashes(strip_tags($_POST['l_email']));
$password = stripslashes(strip_tags($_POST['l_password']));

$logged = new Login($email, $password);

if ($logged->getIslogged()) {
	header("Location: SearchUser.php");
}else{
	header("Location: ../index.php");
}