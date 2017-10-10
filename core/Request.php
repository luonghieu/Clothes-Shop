<?php 
<<<<<<< HEAD
namespace core;
=======
namespace App\Core;


>>>>>>> CSHOP_DAI_USERS

class Request
{
	public static function uri()
	{
<<<<<<< HEAD
		return trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');
=======
		return trim(
			parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'
			);
>>>>>>> CSHOP_DAI_USERS
	}

	public static function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}
?>