<?php

namespace Acme\Users;

/**
* 
*/
class Person
{
	
	protected $name;

	function __construct($name)
	{
		$this->name = $name;
	}
}