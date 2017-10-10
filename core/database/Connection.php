<?php
<<<<<<< HEAD
namespace core\database;
=======

>>>>>>> CSHOP_DAI_USERS
class Connection
{
	public static function make($config)
	{
		ini_set('display_errors', true);
    	error_reporting(E_ALL);
		try{
<<<<<<< HEAD
			return new \PDO (
=======
			return new PDO (
>>>>>>> CSHOP_DAI_USERS
				$config['connection'].';dbname='.$config['name'],
				$config['username'],
				$config['password'],
				$config['options']);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}
?>