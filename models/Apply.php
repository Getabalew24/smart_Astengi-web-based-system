<?php

namespace app\models;

use app\core\DBModel;
use app\core\Application;
use app\core\Model;

class Apply extends DBModel
{
	public string $job = "";
	public string $instructor = "";

	public function tableName(): string
	{
		return 'applyed_job';
	}

	public function attributes(): array
	{
		return ['job', 'instructor'];
	}

	public function rules(): array
	{
		return [
			'job' => [self::RULE_REQUIRED],
			'instructor'=> [self::RULE_REQUIRED],
		];
	}
}