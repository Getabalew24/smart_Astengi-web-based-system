<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\DBModel;
use app\core\Response;
use app\models\Job;
use app\models\User;

class JobController extends Controller
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

	public function addJob(Request $request, Response $response)
	{
		$job = new Job();
		if ($request->isPost()){
			$job->loadData($request->getBody());
			$job->loadData(['createdBy' =>  Application::$app->session->get('auth')]);
			if($job->validate() && $job->save()){
				$response->redirect('/jobs');
			}

		}
		
		return $this->render('add_job', ['model' => $job]);
	}
	
	public function listJob(Request $request, Response $response)
	{

		$jobs = DBModel::all('job');
		$primary_key = Application::$app->session->get('auth');
		$applyed = array_map(fn($aply) => $aply['job'], DBModel::list(['instructor' => $primary_key], 'applyed_job'));


		return $this->render('list_jobs', ['jobs' => $jobs, 'user' => $this->user, 'applyed' => $applyed]);


	}

	public function jobDetail(Request $request, Response $response)
	{
		$primary_key = $_GET['id'];
		$job = DBModel::findOne(['id' => $primary_key], 'job');
		unset($job->id);
		unset($job->createdBy);
		unset($job->created_at);
		return $this->render('job_detail', ['job' => $job, 'user' => $this->user]);
	}


	public function updateJob(Request $request, Response $response)
	{	
		
		$job = new Job();
		if ($request->isGet()){
			$primary_key = $_GET['id'];
			$job->loadData(DBModel::findOne(['id' => $primary_key], 'job'));
			
		}

		// if ($this->user->role > 2){
		// 	$response->redirect('/jobs');
		// }

		if($request->isPost()){
			$primary_key = $_GET['id'];
			$job->loadData($request->getBody());
			if ($job->validate() && $job->update(['id' => $primary_key])) {
				return $response->redirect("/jobs");
			}
				return $this->render('update_job', ['model' => $job, 'user' => $this->user]);

		}
		return $this->render('update_job', ['model' => $job, 'user' => $this->user]);
	}

	public function deleteJob(Request $request, Response $response)
	{

		if ($this->user->role > 2){
			$response->redirect('/jobs');
		}
		$primary_key = $_GET['id'];
		DBModel::delete(['id' => $primary_key], 'job');
		return $response->redirect('/jobs');
	}
}

?>