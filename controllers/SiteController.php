<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

class SiteController extends Controller
{
	public function home(Request $request, Response $response)
	{
		return $this->render('home');
								
	}
	public function contact()
	{
		return $this->render('contact');
	}
	public function about()
	{
		return $this->render('about');
	}

	public function handleContact(Request $request)
	{
		$body = Application::$app->request->getBody();
		return 'Handling submitted data';
	}
}

?>