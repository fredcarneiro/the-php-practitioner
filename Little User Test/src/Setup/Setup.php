<?php

namespace Carneiro\Setup;

Use Carneiro\DB\DBConnection;

/**
* 
*/
class Setup 
{
	
	private $connection;
	
	function __construct(DBConnection $conn)
	{
		$this->connection = $conn->connect();
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