<?php

namespace Carneiro\DB;

/**
* Databse Connection
*/
class DBConnection
{
	
	private $dbUser = 'root';
	private $dbUserPassword = 'root';
	private $dbServer = 'localhost';
	private $dbPort = '3306';
	private $dbName = 'littleusertest';
	private $connection;


	function __construct()
	{
		$this->connection = mysqli_connect($this->dbServer, $this->dbUser, $this->dbUserPassword, $this->dbName);
	}

	public function getConnection()
	{
		return $this->connection;
	}

	public function closeConnection($connection)
	{
		mysqli_close($link);
	}

	public function createDatabase()
	{
		
		$query = "DROP TABLE IF EXISTS user";
		$result = mysqli_query($this->connection, $query);

		//var_dump($result);
		
		if ($result) {
			$query = "	CREATE TABLE user
			(
			    id INTEGER NOT NULL AUTO_INCREMENT,
			    name VARCHAR(255) NOT NULL,
			    email VARCHAR(255) NOT NULL,
			    password VARCHAR(255) NOT NULL,
			    country VARCHAR(2) NOT NULL,
			    timezone VARCHAR(35) NOT NULL,
			    PRIMARY KEY (id)
			) ENGINE=InnoDB ";
			return mysqli_query($this->connection, $query);
		}else{
			return false;
		}



	}

}