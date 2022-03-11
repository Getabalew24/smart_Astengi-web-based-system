<?php
	
namespace app\core;

use \PDO;
use app\core\Application;

class Database
{	
	public PDO $pdo;

	public function __construct(array $config) 
	{
		$dsn = $config['dsn'];
		$user = $config['user'];
		$password = $config['password'];

		$this->pdo = new PDO($dsn, $user, $password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function applyMigrations($value='')
	{
		$this->createMigrationsTable();
		
		$appliedMigrations = $this->getAppliedMigrations();

		$newMigration = [];
		$files = scandir(Application::$ROOT_DIR."/migrations");
		$toApplyMigrations = array_diff($files, $appliedMigrations);

		foreach ($toApplyMigrations as $migration) {
			if ($migration === '.' || $migration === '..'){
				continue;
			}

			require_once Application::$ROOT_DIR.'/migrations/'.$migration;
			$className = pathinfo($migration, PATHINFO_FILENAME);
			
			$instance = new $className;
			$this->log("Applying migration $migration");
			$instance->up();
			$this->log("Applied migration $migration");
			$newMigration[] = $migration;
		}

		if (!empty($newMigration)){
			$this->saveMigrations($newMigration);
		} else {
			$this->log("All migrations are applied");
		}
	}

	public function createMigrationsTable($value='')
	{
		$this->pdo->exec("CREATE TABLE IF NOT EXISTS `migrations` (
				`id` INT PRIMARY KEY AUTO_INCREMENT,
				`migration` VARCHAR(200),
				`date_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
			) ENGINE=INNODB;");
	}
	public function getAppliedMigrations()
	{
		$stmt = $this->pdo->prepare("SELECT migration FROM migrations");
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_COLUMN);
	}

	public function saveMigrations($migrations)
	{
		$str = implode(",", array_map(fn($m) => "('$m')", $migrations));
		
		$stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
		$stmt->execute();
	}

	public static function prepare($sql){
		return Application::$app->db->pdo->prepare($sql);
	}

	protected function log($message)
	{
		echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
	}
}
?>