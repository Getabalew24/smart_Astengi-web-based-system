<?php

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class m005_insert_admin {
    public function up()
    {
        $username = $_ENV['Name'];
        $password = password_hash($_ENV['PASSWORD'], PASSWORD_DEFAULT);
        $db = Application::$app->db;
        $SQL = "INSERT INTO user (username, password, role) VALUES ('$username',  '$password', 1)";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE user;";
        $db->pdo->exec($SQL);
    }
}
