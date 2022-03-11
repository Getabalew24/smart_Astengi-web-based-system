<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use app\core\DBModel;

class LoginForm extends Model
{
	public string $username = '';
	public string $password = '';
	
	public function tableName(): string
	{
		return 'user';
	}
	public function rules(): array
	{
		return [
			'username' => [self::RULE_REQUIRED,],
			'password' => [self::RULE_REQUIRED],
		];
	}
	public function login(){
		$user = DBModel::findOne(['username' => $this->username, 'status' => 1], $this->tableName());

		if (!$user) {
			return false;
		}
		if (!password_verify($this->password, $user->password)) 
		{
			return false;
		}

		Application::$app->session->set('auth', $user->id);
		return true;
	}
}

?>