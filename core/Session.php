<?php

namespace app\core;

class Session 
{
	public function __construct()
	{
		session_start();
	}
	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function get($name)
	{
		if (isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		return null;
	}

	public function remove($name)
	{
		unset($_SESSION[$name]);
	}

	public function destroy()
	{
		session_destroy();		
	}
}

?>