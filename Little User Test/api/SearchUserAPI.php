<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

function loadClass($class)
{
	require_once '../class/'.$class.'.php';
}

spl_autoload_register('loadClass');

if (empty($_POST)) {
	die();
}

$term = $_POST['term'];

$c = new DBConnection();
$userDAO = new UserDAO($c);

echo json_encode($userDAO->search($term));
