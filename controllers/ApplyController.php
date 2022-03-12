<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\DBModel;
use app\core\Response;
use app\models\Job;
use app\models\User;
use app\models\Apply;

class ApplyController extends Controller
{
	public Request $request;
	public Response $response;
	
	public function __construct()
	{
		if (!Application::$app->isAuthenticated())
		{
			return Application::$app->response->redirect('/login');
		} 
		$this->user = new User();
		$primary_key = Application::$app->session->get('auth');
		$this->user->loadData(User::getUser($primary_key));
	}

	public function Apply_job(Request $request, Response $response){


		$apply = new Apply();

		if ($request->isPost()){
			$primary_key = Application::$app->session->get('auth');
			$apply->loadData($request->getBody());
			$apply->loadData(['instructor' => $primary_key]);
			if($apply->validate() && $apply->save()){
				return $this->render('apply_job', ['apply' => $apply, 'user' => $this->user]);
				
			}

		}
	}
}