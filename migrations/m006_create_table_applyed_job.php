<?php

use app\core\Application;
class m006_create_table_applyed_job {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS `applyed_job` (
                id INT PRIMARY KEY AUTO_INCREMENT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                job INT,
                instructor INT,
                CONSTRAINT `job_fk` FOREIGN KEY (`job`) REFERENCES `smart_db`.`job`(`id`),
                CONSTRAINT `user_agreement_fk` FOREIGN KEY (`instructor`) REFERENCES `smart_db`.`user`(`id`)
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE applyed_job;";
        $db->pdo->exec($SQL);
    }
}
?>