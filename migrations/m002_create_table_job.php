<?php

use app\core\Application;

class m002_create_table_job {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS `job` (
                id INT PRIMARY KEY AUTO_INCREMENT,
                Name_of_student VARCHAR(255) NOT NULL,
                gradeLevel INT NOT NULL,
                No_student INT NOT NULL,
                Duration INT NOT NULL,
                Day_Per_week INT NOT NULL,
                Salary INT NOT NULL,
                addereas VARCHAR(255) NOT NULL,
                description TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE job;";
        $db->pdo->exec($SQL);
    }
}