<?php
class Router
{
	private $routes;
	
	public function __construct(){
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}
	
	private function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	
	public function run(){
		$uri = $this->getURI();
		
		foreach($this->routes as $uriPattern => $path){
			if(preg_match("~$uriPattern~", $uri)){
				
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				if($uriPattern == ''){
					header("Location: user");
				}
				
				$segments = explode('/', $internalRoute);
				if(MVC == 'MVC' && $uri){
					array_shift($segments);
				}
				
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action' . ucfirst(array_shift($segments));
				
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
				
				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}
				
				$params = $segments;
				
				$controllerObject = new $controllerName;
				$result = $controllerObject->$actionName($params);
				
				if($result != null){
					break;
				}
			}
		}
	}
}