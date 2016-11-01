<?php

namespace Carneiro\DB;

/**
* User DAO Interface
*/
abstract class DBConnection
{
	private $dbUser;
	private $dbUserPassword;
	private $dbServer;
	private $dbPort;
	private $dbName;
	private $connection;

	abstract function connect();
	abstract function closeConnection();

}