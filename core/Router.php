<?php
namespace app\core;

use app\core\Request; 
use app\core\Response;


class Router
{
	protected $routes = [];
	public Request $request;
	public Response $response;

	public function __construct($request, $response){
		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback){
		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback){
		$this->routes['post'][$path] = $callback;
	}


	public function resolve(){
		$method = $this->request->method();
		$path = $this->request->getPath();
		$callback = $this->routes[$method][$path] ?? false;

		if ($callback == false){
			return "Not Found";

		}
		if (is_string($callback)){
			return $this->renderOnlyview($callback);
		}

		
		if (is_array($callback)) {
			
			Application::$app->controller = new $callback[0];
			$callback[0] = Application::$app->controller; 
		}

		return call_user_func($callback, $this->request, $this->response);
	}

	public function renderview($view, $params=[])
	{
		$layoutContent = $this->layoutContent();
		$viewContent = $this->renderOnlyview($view, $params);
		return str_replace('{{content}}', $viewContent, $layoutContent);
		include_once Applicatiion::$ROOT_DIR."/views/$view.php";

	}

	protected function layoutContent()
	{
		$layout = Application::$app->controller->layout;
		ob_start();
		include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
		return ob_get_clean();
	}

	protected function renderOnlyview($view, $params=[])
	{
		foreach ($params as $key => $value) {
			$$key = $value;
		}
		ob_start();
		include_once Application::$ROOT_DIR."/views/$view.php";
		return ob_get_clean();
	}
}

?>