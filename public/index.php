<?php

use Slim\Views\Twig;
use DI\Bridge\Slim\Bridge;
use ProjetPC\controllers\HomeController;
use ProjetPC\controllers\BuildController;
use ProjetPC\middleware\SessionMiddleware;
use ProjetPC\controllers\ConnectController;
use ProjetPC\middleware\CheckAutorisationMiddleware;

require_once "../vendor/autoload.php";

// Crée ou renouvelle la session
session_start(); 

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
// $app->add(new CheckAutorisationMiddleware);
$app->add(new SessionMiddleware);

//var_dump($_SESSION);

// Routing
$app->get('[/]', [homeController::class, 'home']); 
$app->get('/home', [HomeController::class, "home"]);
$app->get('/build', [BuildController::class, "formDisplay"])->add(new CheckAutorisationMiddleware());;
$app->post("/build", [BuildController::class, "formProcess"]);
$app->get('/connect', [ConnectController::class, "connect"]);



//Start de l'app
$app->run();    