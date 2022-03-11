<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Application;
use app\models\User;
use app\core\DBModel;
use app\models\UpdateUser;

class DashboardController extends Controller
{
	public Request $request;
	public Response $response;
	public User $user;
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

	public function dashboard(Request $request, Response $response)
	{

		return $this->render('dashboard', ['user' => $this->user]);
	}

	public function listCoustmer(Request $request, Response $response)
	{
		if ($this->user->role != 1) {
			return $response->redirect('/dashboard');
		}
		$coustmer = DBModel::list(['role' => 2, 'status' => 1], $this->user->tableName());
		
		return $this->render('list_coustmer', ['coustmer' => $coustmer, 'user' => $this->user]);	
	}


	public function listInstructor(Request $request, Response $response)
	{
		if ($this->user->role > 2) {
			return $response->redirect('/dashboard');
		}
		$instructor = DBModel::list(['role' => 3, 'status' => 1], $this->user->tableName());
		
		return $this->render('list_Instructor', ['instructor' => $instructor, 'user' => $this->user]);	
	}

}

