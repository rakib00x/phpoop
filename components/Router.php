<?php 
class Router{
	private $routes;
	function __construct(){
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	private function getURI(){
		if (!empty($_SERVER['REQUEST_URI'])) return trim($_SERVER['REQUEST_URI'], '/');
	}
	public function run(){
		$uri = $this->getURI();
		foreach ($this->routes as $uriPattern => $path) {
			if (preg_match("~$uriPattern~", $uri)) {
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$parameters = explode("/", $internalRoute);
				if (in_array($parameters[0], LANGS)) $lang = array_shift($parameters);
				else {
					session_start();
					if (isset($_SESSION['user']['lang'])) $lang = $_SESSION['user']['lang'];
					else $lang = DEFAULT_LANG;
					if ($parameters[0]==="error") {
						$langpack = include(ROOT.'/config/langpacks/'.$lang.'_partials.php');
						include_once(ROOT."/controllers/ErrorController.php");
						$errorController = new ErrorController($lang, $langpack);
						$result = $errorController->actionIndex();
						if ($result) break;
					}
				}
				$langpack = include(ROOT.'/config/langpacks/'.$lang.'_partials.php');
				$controllerName = array_shift($parameters).'Controller';
				$controllerName = ucfirst($controllerName);
				$actionName = "action".ucfirst(array_shift($parameters));
				$controllerFile = ROOT."/controllers/".$controllerName.".php";
				if (file_exists($controllerFile)) include_once($controllerFile);
				$controllerObject = new $controllerName($lang, $langpack);
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result) break;
			}
		}
	}
}
?>