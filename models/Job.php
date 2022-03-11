<?php

namespace app\models;

use app\core\DBModel;
use app\core\Application;
use app\core\Model;

class Job extends DBModel
{
	public string $Name_of_student = "";
	public int $gradeLevel = 1;
	public int $No_student = 1;
	public int $Duration = 1;
	public int $Day_Per_week = 1;
	public int $Salary = 1;
	public string $addereas = "";
	public string $description = " ";

	public function tableName(): string
	{
		return 'job';
	}

	public function attributes(): array
	{
		return ['Name_of_student','gradeLevel', 'No_student','Duration', 'Day_Per_week', 'Salary', 'addereas', 'description'];
	}

	public function rules(): array
	{
		return [
			'Name_of_student' => [self::RULE_REQUIRED],
			'gradeLevel' => [self::RULE_REQUIRED],
			'No_student' => [self::RULE_REQUIRED],
			'Duration' => [self::RULE_REQUIRED],
			'Day_Per_week' => [self::RULE_REQUIRED],
			'Salary' => [self::RULE_REQUIRED],
			'addereas' => [self::RULE_REQUIRED],
			'description' => [self::RULE_REQUIRED]
		];
	}
}