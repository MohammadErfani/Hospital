<?php

use app\core\Application;

class m0003_create_patients
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE patients (
id INT PRIMARY KEY
)  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE patients;";
        $db->pdo->exec($SQL);
    }
}