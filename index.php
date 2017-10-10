<?php
<<<<<<< HEAD
ob_start();
require "core/Autoload.php";
new core\Autoload;

require 'core/bootstrap.php';

use core\Router;
use core\Request;

Router::load('app/routes.php')->direct(Request::uri(),Request::method());

?>
=======
require 'vendor/autoload.php';
$query=require 'core/bootstrap.php';

use App\Core\Router;
use App\Core\Request;

Router::load('app/routes.php')->direct(Request::uri(),Request::method());
?>























>>>>>>> CSHOP_DAI_USERS
