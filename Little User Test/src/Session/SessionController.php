<?php
namespace Carneiro\Session;

/**
* Session Controll Class 
*/
class SessionController
{
	
	function __construct()
	{
		session_start();

		if (array_key_exists('email', $_SESSION)) {
			$_SESSION['email'] = '';
		}
	}

	public function createSession($user)
	{

		if (is_null($user)) {
			return false;
		}else{
			$_SESSION['email'] = $user['email'];
			return true;
		}

		
	}

	public function isLoggedIn($params)
	{

		if (array_key_exists('email', $params)) {
			return true;
		}else{
			return false;
		}

	}

	public function killSession()
	{
		session_start();
		session_destroy();
		
		return true;
	}
		
}
