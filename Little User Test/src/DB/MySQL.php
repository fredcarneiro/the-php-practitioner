<?php

namespace Carneiro\DB;

Use Carneiro\DB\DBConnection;

/**
* MySQL Connection
*/
class MySQL extends DBConnection
{
	
	private $dbUser = 'root';
	private $dbUserPassword = 'root';
	private $dbServer = 'localhost';
	private $dbPort = '3306';
	private $dbName = 'littleusertest';

	public function connect()
	{
		return mysqli_connect($this->dbServer, $this->dbUser, $this->dbUserPassword, $this->dbName);
	}

	public function closeConnection()
	{
		mysqli_close($this->connection);
	}

}