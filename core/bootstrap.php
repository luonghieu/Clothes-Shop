<?php
<<<<<<< HEAD
use core\App;
use core\database\Connection;
use core\database\QueryBuilder;

App::bind('config',require 'config.php'); 

// //$config=App::get('config');
// // $app=[];
// // $app['config']=require 'config.php';
// // $config=require 'config.php';
=======
use App\Core\App;


App::bind('config',require 'config.php'); 

//$config=App::get('config');
// $app=[];
// $app['config']=require 'config.php';
// $config=require 'config.php';
>>>>>>> CSHOP_DAI_USERS
App::bind('database',new QueryBuilder(
	Connection::make(App::get('config')['database'])
	));


function view($name,$data=[])
{
	extract($data);
	return require "app/views/{$name}.view.php";
}
function redirect($path)
{
	header("location:/{$path}");
}
?>		