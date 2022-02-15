<?php

use Slim\Views\Twig;
use DI\Bridge\Slim\Bridge;
use ProjetPC\middleware\TempMiddleware;
use ProjetPC\controllers\HomeController;
use ProjetPC\controllers\BuildController;
use ProjetPC\controllers\ConnectController;

require_once "../vendor/autoload.php";

// PDO
$pdo = new PDO(
    "mysql:host=localhost;dbname=projet_pc;charset=utf8",
    "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


// Mise en place de l'utilisation de Slim/ DI / Twig
$builder = new DI\ContainerBuilder();
$container = $builder->build();
$container->set("twig", function(){
    return Twig::create("../views");
});
$container->set("pdo", function() use ($pdo){
    return $pdo;
});
$app = Bridge::create($container);


// Application d'un middleware à toute les routes pour gestion de la session
$app->add(new TempMiddleware);


// Routing
$app->get('/home', [HomeController::class, "home"]);
$app->get('/build', [BuildController::class, "formDisplay"]);
$app->post("/build", [BuildController::class, "formProcess"]);
$app->get('/connect', [ConnectController::class, "connect"]);


//Start de l'app
$app->run();    