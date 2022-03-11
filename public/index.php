<?php

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\DashboardController;
use app\controllers\JobController;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
	'db' => [
		'dsn' => $_ENV['DB_DSN'],
		'user' => $_ENV['DB_USER'],
		'password' =>"",
  ],
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/',[SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class,'contact']);
$app->router->post('/contact', [SiteController::class, 'conact']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->post('/about', [SiteController::class, 'about']);
$app->router->get('/dashboard', [DashboardController::class, 'dashboard']);
$app->router->get('/login', [AuthController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->post('/logout', [AuthController::class,'logout']);
$app->router->get('/logout', [AuthController::class,'logout']);
$app->router->post('/Coustmer/register',[AuthController::class, 'registerCustomer']);
$app->router->get('/Coustmer/register',[AuthController::class, 'registerCustomer']);
$app->router->post('/Instructor/register',[AuthController::class, 'addInstructor']);
$app->router->get('/Instructor/register',[AuthController::class, 'addInstructor']);
$app->router->post('/Coustmer',[DashboardController::class, 'listCoustmer']);
$app->router->get('/Coustmer',[DashboardController::class, 'listCoustmer']);
$app->router->post('/Instructor',[DashboardController::class, 'listInstructor']);
$app->router->get('/Instructor',[DashboardController::class, 'listInstructor']);
$app->router->post('/dashboard/update',[AuthController::class, 'updateUser']);
$app->router->get('/dashboard/update',[AuthController::class, 'updateUser']);
$app->router->post('/Coustmer/delete',[AuthController::class, 'deleteCoustmer']);
$app->router->get('/Coustmer/delete',[AuthController::class, 'deleteCoustmer']);
$app->router->post('/Instructor/delete',[AuthController::class, 'deleteCoustmer']);
$app->router->get('/Instructor/delete',[AuthController::class, 'deleteCoustmer']);
$app->router->get('/jobs', [JobController::class, 'listJob']);
$app->router->post('/jobs', [JobController::class, 'listJob']);
$app->router->get('/jobs/add', [JobController::class, 'addJob']);
$app->router->post('/jobs/add', [JobController::class, 'addJob']);
$app->router->get('/jobs/detail', [JobController::class, 'jobDetail']);
$app->router->post('/jobs/detail', [JobController::class, 'jobDetail']);
$app->router->get('/jobs/update', [JobController::class, 'updateJob']);
$app->router->post('/jobs/update', [JobController::class, 'updateJob']);
$app->router->get('/jobs/delete', [JobController::class, 'deleteJob']);
$app->router->post('/jobs/delete', [JobController::class, 'deleteJob']);

$app->run();

?>





