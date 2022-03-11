<?php

namespace app\core;

use app\core\Application;
use app\models\User;

class Controller
{
  public function render($view, $params = [])
  {
  	return Application::$app->router->renderview($view, $params);
  }

  public string $layout = 'main';
  public function setLayout($layout)
  {
  	$this->layout = $layout;
  }

}

?>