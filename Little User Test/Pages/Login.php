<?php
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