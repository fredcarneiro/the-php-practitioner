<?php

namespace Carneiro\Users;

/**
* User Class
*/
class User
{

	private $name;
	private $email;
	private $password;
	private $country;
	private $timezone;
	
	function __construct($name = '', $password = '', $country = '', $timezone = '', $email = '')
	{

		$this->setName($name);
		$this->setPassword($password);
		$this->setCountry($country);
		$this->setTimezone($timezone);
		$this->setEmail($email);

	}


	public function setName($name)
	{
		$this->name = $name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function setTimezone($timezone)
	{
		$this->timezone = $timezone;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function getTimezone()
	{
		return $this->timezone;
	}

}