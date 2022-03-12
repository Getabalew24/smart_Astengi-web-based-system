<?php

use app\core\Application;

class m002_insert_roles {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "INSERT INTO role VALUES (1, 'Admin'), (2, 'Customer'), (3, 'Instructor')";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DELETE FROM role;";
        $db->pdo->exec($SQL);
    }
}