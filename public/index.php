<?php

use Slim\Views\Twig;
use DI\Bridge\Slim\Bridge;
use ProjetPC\controllers\HomeController;
use ProjetPC\controllers\BuildController;
use ProjetPC\controllers\ConnectController;

require_once "../vendor/autoload.php";

//PDO
$pdo = new PDO(
    "mysql:host=localhost;dbname=projet_pc;charset=utf8",
    "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


//Instanciation du container
$builder = new DI\ContainerBuilder();
$container = $builder->build();
//
$container->set("twig", function(){
    return Twig::create("../views");
});
//
$app = Bridge::create($container);

//Routing
//Home
$app->get('/home', [HomeController::class, "home"]);

$app->get('/build', [BuildController::class, "build"]);

$app->get('/connect', [ConnectController::class, "connect"]);




//Start de l'app
$app->run();    