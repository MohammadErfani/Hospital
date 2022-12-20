<?php
use app\core\Application;

class m0004_create_doctors
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE doctors (
    id INT PRIMARY KEY,
    specialty varchar(255) NULL ,
    isRegister bool NOT NULL,
    phone varchar(11) NULL ,
    price int NULL ,
    days TEXT NULL ,
    hours TEXT NULL,
    address TEXT NULL,
    instagram   varchar(100),
    telegram varchar(100) 
)  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }
    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE doctors;";
        $db->pdo->exec($SQL);
    }
}