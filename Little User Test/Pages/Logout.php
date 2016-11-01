<?php
require_once '../vendor/autoload.php';

Use Carneiro\Session\SessionController;

$sessionControl = new SessionController();

//echo 'Fred';

if ($sessionControl->killSession()) {
	header("Location: ../index.php");
}