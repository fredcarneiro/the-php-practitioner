<?php

/**
* This will create the USER table on mysql
*/
require_once 'vendor/autoload.php';

Use Carneiro\DB\MySQL;
Use Carneiro\Setup\Setup;

$result = new Setup(new MySQL());

if ($result->createDatabase()) {
	echo "<pre> User table created. </pre>";
	echo "<a href='index.asp'>Back to Index</a>";
}else{
	echo "<pre>Something is wrong with the script.</pre>";
}