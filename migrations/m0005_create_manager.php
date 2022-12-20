<?php
use app\core\Application;

class m0005_create_manager
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE users (
id INT PRIMARY KEY,
isRegister BOOL NOT NULL 
)  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }
    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}