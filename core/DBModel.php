<?php

namespace app\core;

use app\core\Application;
use app\core\Model;
use \PDO;

abstract class DBModel extends Model
{
	abstract public function tableName (): string;

	abstract public  function attributes(): array;
	
	public function save(){
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		$params = array_map(fn($attr) => ":$attr", $attributes);
		$statement = self::prepare("
			INSERT INTO $tableName (".implode(',', $attributes).") VALUES(".implode(",", $params).")
		");
		foreach ($attributes as $attribute) {
			$statement->bindValue(":$attribute", $this->{$attribute});
		}

		$statement->execute();
		return true;
	}

	public function update($where, $extra_attributes = [])
	{
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		
		foreach ($extra_attributes as $attr){;
			$attributes[] = $key;
		}
		$sql = implode(", ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$condition = implode(" AND ", array_map(fn($con) => "$con = :$con", array_keys($where)));

		$stmt = self::prepare("UPDATE $tableName SET $sql WHERE $condition");
		foreach ($attributes as $attribute) {
			$stmt->bindValue($attribute, $this->{$attribute});
		}
		foreach ($where as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		$stmt->execute();
		return true;
	}

	public static function findOne($where, $tableName)
	{
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
		foreach ($where as $key => $value) {
			$statement->bindValue(":$key", $value);
		}

		$statement->execute();
		return $statement->fetchObject();
	}

	public static function delete($where, $tableName)
	{
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$statement = self::prepare("DELETE FROM $tableName WHERE $sql");
		foreach ($where as $key => $value) {
			$statement->bindValue(":$key", $value);
		}
		$statement->execute();
		return true;
	}

	public static function list(array $where,  $tableName)
	{
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
		foreach ($where as $key => $value) {
			$statement->bindValue(":$key", $value);
		}
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function all($tableName)
	{
		$statement = self::prepare("SELECT * FROM $tableName");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function prepare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);
	}
}