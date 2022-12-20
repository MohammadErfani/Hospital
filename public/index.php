<?php
require_once "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\controllers\ProfileController;
use \app\core\Application;
use \app\controllers\SiteController;
use \app\controllers\AuthController;

$config = [
    'userClass' => \app\models\User::class,
    'db'=>[
        'dsn'=> $_ENV['DB_DSN'],
        'user'=> $_ENV['DB_USER'],
        'password'=> $_ENV['DB_PASSWORD'],

    ]
];
$app = new Application(dirname(__DIR__),$config);

$app->router->get("/",[SiteController::class,'home']);
$app->router->post('/',[SiteController::class,'doctor']);
$app->router->get('/about',[SiteController::class,'about']);
$app->router->get("/login",[AuthController::class,'login']);
$app->router->post("/login",[AuthController::class,'login']);
$app->router->get("/register",[AuthController::class,'register']);
$app->router->post("/register",[AuthController::class,'register']);
$app->router->get('/department',[SiteController::class,'department']);
$app->router->post('/department',[SiteController::class,'doctor']);
$app->router->get('/profile',[ProfileController::class,'profile']);
$app->router->post('/profile',[ProfileController::class,'profile']);
$app->router->get('/manager',[ProfileController::class,'manager']);
$app->router->post('/manager',[ProfileController::class,'manager']);
$app->router->post('/search',[SiteController::class,'search']);
$app->router->get('/logout',[AuthController::class,'logout']);
$app->run();

