<?php
namespace app\models;

use app\core\DBModel;

class UpdateUser extends DBModel
{
	public string $username = '';
	public string $firstname ='';
	public string $lastname ='';
	public string $email ='';
	public int $status = 1;
	public int $role = 3;

	public function tableName(): string
	{
		return 'user';
	}
	public function attributes(): array
	{
		return ['firstname', 'lastname', 'email', 'role', 'status'];
	}

	public function rules(): array
	{
		return [
			'firstname' => [self::RULE_REQUIRED],
			'lastname' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
		];
	}
}
?>