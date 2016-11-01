<?php

namespace Carneiro\DAO;

Use Carneiro\Users\User;
Use Carneiro\DAO\Interfaces\IUserDAO;
Use Carneiro\DB\DBConnection;

/**
*  User Data Access Object
*/
class UserDAO implements IUserDAO
{
	
	private $connection;

	function __construct(DBConnection $conn)
	{
		$this->connection = $conn->connect();
	}


	public function search($term)
	{
		
		$query = "select name from hellofresh.user where name like '{$term}%' or email like '{$term}%'";
		$result = mysqli_query($this->connection, $query);
		$users = mysqli_fetch_assoc($result);

		foreach ($users as $user) {
			$data[] = $user;
		}

		return $data;
	}	

	public function insert(User $user)
	{
		
		$userSearched = $this->searchByEmailPassword($user->getEmail(), $user->getPassword());

		if (is_null($userSearched)) {
			$passwordMD5 = md5($user->getPassword());
			$timezone = $user->getTimezone()[0];

			$query = "	insert into 
						user(name, email, password, country, timezone)
						values
						('{$user->getName()}', '{$user->getEmail()}', '{$passwordMD5}', '{$user->getCountry()}', '{$timezone}')";

			return mysqli_query($this->connection, $query);

		}else{
			$_SESSION["error_signup"] = 'E-mail already taken.';
			return false;
		}


	}

	public function searchByEmailPassword($email, $password)
	{
		$passwordMD5 = md5($password);
		$email = mysqli_real_escape_string($this->connection, $email);
		$query = "select * from user where email='{$email}' and password='{$passwordMD5}'";
		$result = mysqli_query($this->connection, $query);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}

}