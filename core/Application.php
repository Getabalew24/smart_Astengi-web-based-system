<?php
namespace app\core;

use app\core\Router;
use app\core\Request;
use app\core\Session;

class Application
{
	public static string $ROOT_DIR; 
	public Router $router;
	public Request $request;
	public Database $db;
	public Controller $controller;
	public Response $response;
	public Session $session;
	public static $app;
	
	public function __construct($rootpath, array $config){
		self::$app = $this;
		self::$ROOT_DIR = $rootpath;
		$this->request = new Request();
		$this->response = new Response(); 
		$this->router = new Router($this->request, $this->response);
		$this->session = new Session();
		$this->db = new Database($config['db']);
	}

    public function run(){
        echo $this->router->resolve();
    }

    public function getController(): \app\core\Controller
    {
    	return $this->Controller;
    }

     public function setController(\app\core\Controller $controller): void
    {
    	 $this->controller = $controller;
    }

    public function isAuthenticated()
    {
    	return $this->session->get('auth') !== null;
    }		

}
?>