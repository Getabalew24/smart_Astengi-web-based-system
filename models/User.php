<?php
namespace app\models;
use app\core\DBModel;


class User extends DBModel 
{	
	public string $username = '';
	public string $firstname ='';
	public string $lastname ='';
	public string $email ='';
	public int $role = 2;
	public string $password ='';
	public string $confirm ='';

	public function tableName(): string
	{
		return 'user';
	}

	public function register($role)
	{
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		$this->role = $role;
		return $this->save();
	}

	public function attributes(): array
	{
		return ['username','firstname', 'lastname', 'email', 'password', 'role'];
	}
	
	public function rules(): array
	{
		return [
			'username' => [self::RULE_REQUIRED],
			'firstname' => [self::RULE_REQUIRED],
			'lastname' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
			'confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
		];
	}

	public static function getUser($primary_key)
	{
		return DBModel::findOne(['id' => $primary_key], 'user');
	}
}

?>