<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

Use Carneiro\Users\User;
Use Carneiro\DAO\UserDAO;
Use Carneiro\Login\Login;
Use Carneiro\DB\MySQL;

session_start();


if (empty($_POST)) {
	header("Location: ../index.php");
}

$email 		= stripslashes(strip_tags($_POST['email']));
$password 	= stripslashes(strip_tags($_POST['password']));
$name 		= stripslashes(strip_tags($_POST['name']));
$country 	= stripslashes(strip_tags($_POST['country']));

$timezone = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $country);

$user = new User($name, $password, $country, $timezone, $email);

$userDAO = new UserDAO(new MySQL());

if ($userDAO->insert($user)) {
	
	$logged = new Login($email, $password);

	if ($logged->getIslogged()) {
		header("Location: SearchUser.php");
	}else{
		header("Location: ../index.php");
	}

}else{
	echo "<pre>Error Signin Up</pre>";
	echo "<a href='../index.asp'>Back to Index</a>";
}
