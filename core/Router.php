<?php 
<<<<<<< HEAD
namespace core;
=======
namespace App\Core;


>>>>>>> CSHOP_DAI_USERS

class Router
{
	protected $routes=[
<<<<<<< HEAD
	'GET'=>[],
	'POST'=>[]
=======
		'GET'=>[],
		'POST'=>[]
>>>>>>> CSHOP_DAI_USERS
	];

	public static function load($file)
	{
		$router=new static;
		require $file;
		return $router;
	}

<<<<<<< HEAD
=======
	// public function define($routes)
	// {
	// 	$this->routes=$routes;
	// }

>>>>>>> CSHOP_DAI_USERS
	public function get($uri,$controller)
	{
		$this->routes['GET'][$uri]=$controller;
	}

	public function post($uri,$controller)
	{
		$this->routes['POST'][$uri]=$controller;
	}

	public function direct($uri,$requestType)
	{
<<<<<<< HEAD
		$params = [];
		foreach( $this->routes[$requestType] as $url=>$controller ){
			if( $url === '*' ){
				$checkRoute = true;
			}elseif( strpos($url, '{') === FALSE ){
				if( strcmp(strtolower($url), strtolower($uri)) === 0 ){
					$checkRoute = true;
				}else{
					continue;
				}
			}elseif( strpos($url, '}') === FALSE ){
				continue;
			}else{
				$routeParams 	= explode('/', $url);
				$requestParams 	= explode('/', $uri);

				if( count($routeParams) !== count($requestParams) ){
					continue;
				}

				foreach( $routeParams as $k => $rp ){
					if( preg_match('/^{\w+}$/',$rp) ){
						$params[] = $requestParams[$k];
					}
				}

				$checkRoute = true;
			}

			if( $checkRoute === true ){
				$this->callAction(
					explode('@',$controller)[0],explode('@',$controller)[1],$params
					);
				return;
			}else{
				continue;
			}
		}

		throw new Exception('No route definded for this URI.');
	}
	protected function callAction($controller,$action,$params)
	{
		$controller="app\\controllers\\{$controller}";
=======
		if(array_key_exists($uri,$this->routes[$requestType]))
		{

			return $this->callAction(
				...explode('@',$this->routes[$requestType][$uri])
				);
		}
		throw new Exception('No route definded for this URI.');
	}
	protected function callAction($controller,$action)
	{
		$controller="App\\Controllers\\{$controller}";
>>>>>>> CSHOP_DAI_USERS
		$controller=new $controller;
		if(!method_exists($controller,$action)){
			throw new Exception(
				"{$controller} dose not respond to the {$action} action."
				);
<<<<<<< HEAD
		}else{
			call_user_func_array([$controller,$action], $params);
			return;
		}
=======
		}
		return $controller->$action();
>>>>>>> CSHOP_DAI_USERS
	}
}
?>