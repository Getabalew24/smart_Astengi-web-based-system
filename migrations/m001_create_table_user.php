<?php

use app\core\Application;
class m001_create_table_user {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS `user` (
                id INT PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(25) NOT NULL,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL DEFAULT 1,
                phone_number INT(10) NOT NULL,
                date_of_birth DATE,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                role INT,
                CONSTRAINT `role_fk` FOREIGN KEY (`role`) REFERENCES `smart_db`.`role`(`id`)
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE user;";
        $db->pdo->exec($SQL);
    }
}
?>