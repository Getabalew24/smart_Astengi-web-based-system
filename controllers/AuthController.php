<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\DBModel;
use app\models\User;
use app\models\LoginForm;
use app\models\UpdateUser;

class AuthController extends controller
{
	public function __construct()
	{
		if (Application::$app->isAuthenticated())
		{
			$this->user = new User();
			$primary_key = Application::$app->session->get('auth');
			$this->user->loadData(User::getUser($primary_key));
		} 
	}

    public function addUser(Request $request, Response $response, $role, $redirect)
	{
		$registerModel = new User();
		if($request->isPost()){
			$registerModel->loadData($request->getBody());
			if ($registerModel->validate() && $registerModel->register($role=$role)) {
				return $response->redirect("/dashboard");
			}

		}
		return $this->render('register', ['model' => $registerModel]);	
    }
    public function registerCustomer(Request $request, Response $response)
	{
		
		return $this->addUser($request, $response, 2, 'register');
				
	}

	public function addInstructor(Request $request, Response $response)
	{
		// if ($this->user->role > 2){
		// 	$response->redirect('/dashboard');
		// }
		return $this->addUser($request, $response, 3, 'members');
	}
	public function updateUser(Request $request, Response $response)
	{	
	
		$updateModel = new UpdateUser();
		if ($request->isGet()){
			$primary_key = $_GET['id'];
			$updateModel->loadData(User::getUser($primary_key));
			echo var_dump($updateModel->role);
		}

		if ($this->user->role >= $updateModel->role){
			$response->redirect('/dashboard');
		}

		if($request->isPost()){
			$primary_key = $_GET['id'];
			$user_role = User::getUser($primary_key)->role;
			$updateModel->loadData($request->getBody());
			$updateModel->role = $user_role;
			if ($updateModel->validate() && $updateModel->update(['id' => $primary_key])) {
				return $response->redirect("/dashboard/upda?id=$primary_key");
			}
			return $this->render('update_user', ['model' => $updateModel]);	
		}
		return $this->render('update_user', ['model' => $updateModel]);
	}

	


	public function login(Request $request, Response $response)
	{
		$loginForm = new LoginForm();
		if ($request->isPost()) {
			$loginForm->loadData($request->getBody());

			if ($loginForm->validate() && $loginForm->login()){
				$response->redirect('/dashboard');
			}
		}
		$this->setLayout('auth');
		return $this->render('login',  ['model' => $loginForm]);
	}

	public function deleteCoustmer(Request $request, Response $response)
	{

		if ($this->user->role != 1){
			$response->redirect('/dashboard');
		}
		$primary_key = $_GET['id'];
		DBModel::delete(['id' => $primary_key], 'user');
		return $response->redirect('/Coustmer');
	}


	public function deleteInstructor(Request $request, Response $response)
	{

		if ($this->user->role != 1){
			$response->redirect('/dashboard');
		}
		$primary_key = $_GET['id'];
		$user = new UpdateUser();
		$user->loadData(DBModel::findOne(['id' => $primary_key], 'user'));
		$user->status = 0;
		$user->update(['id' => $primary_key]);
		return $response->redirect('/Instructor');
	}

	public function logout(Request $request, Response $response)
	{
		Application::$app->session->remove('auth');
		return $response->redirect('/');

	}
}
?>