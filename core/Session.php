<?php
<<<<<<< HEAD
namespace core;
=======
namespace App\Core;
>>>>>>> CSHOP_DAI_USERS

class Session
{
	public static function createSession($msgKey,$message)
	{
<<<<<<< HEAD
		session_start();
		$_SESSION[$msgKey]=$message;
=======
		ob_start();
		session_start();
		$_SESSION[$msgKey]=$message;
		ob_end_flush();
>>>>>>> CSHOP_DAI_USERS
		
	}

	public static function getSession($msgKey)
	{
		return $_SESSION[$msgKey];
	}

	public static function unsetSession($msgKey)
	{
		unset($_SESSION[$msgKey]);
	}
}
?>