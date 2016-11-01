<?php
namespace Carneiro\Login;

Use Carneiro\DB\DBConnection;
Use Carneiro\DAO\UserDAO;
Use Carneiro\Session\SessionController;

/**
* Login Class
*/
class Login
{
	
	private $userDAO;
	private $sessionController;
	private $isLogged = false;

	function __construct($email, $password)
	{
		$connection = new DBConnection();
		$userDAO = new UserDAO($connection);
		$this->sessionController = new SessionController(); 
		$this->userDAO = $userDAO;

		$this->loginUser($email, $password);

	}

	private function loginUser($email, $password)
	{
		
		$user = $this->userDAO->searchByEmailPassword($email, $password);
		
		if ($this->sessionController->createSession($user)) {
			$this->isLogged = true;
		}

	}


	public function getIsLogged()
	{
		return $this->isLogged;
	}


}