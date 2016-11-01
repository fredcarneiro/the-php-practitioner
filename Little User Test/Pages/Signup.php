<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

function loadClass($class)
{
	require_once '../class/'.$class.'.php';
}

spl_autoload_register('loadClass');

if (empty($_POST)) {
	header("Location: ../index.php");
}

$email 		= stripslashes(strip_tags($_POST['email']));
$password 	= stripslashes(strip_tags($_POST['password']));
$name 		= stripslashes(strip_tags($_POST['name']));
$country 	= stripslashes(strip_tags($_POST['country']));

$timezone = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $country);

$user = new User();

$user->setName($name);
$user->setPassword($password);
$user->setCountry($country);
$user->setTimezone($timezone);
$user->setEmail($email);

$c = new DBConnection();
$userDAO = new UserDAO($c);

if ($userDAO->insert($user)) {
	
	$login = new Login();
	$logged = $login->loginUser($email, $password);

	if ($logged) {
		header("Location: SearchUser.php");
	}else{
		header("Location: ../index.php");
	}

}else{
	echo "<pre>".$_SESSION['error_signup']."</pre>";
	echo "<a href='../index.asp'>Back to Index</a>";
	unset($_SESSION['error_signup']);
}
