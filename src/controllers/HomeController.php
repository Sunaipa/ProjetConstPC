<?php

namespace ProjetPC\controllers;

use Slim\Psr7\Response;
use ProjetPC\DAO\ConfigueDAO;
use ProjetPC\controllers\AbstractController;

class HomeController extends AbstractController {

    public function home(Response $response){
        //instanciation du DAO configueDAO
        $daoConfigue = new ConfigueDAO($this->container->get("pdo"));

        $allConfigues = $daoConfigue->findAllFromAdmin();

        
        return $this->render(
            $response, 
            "home.twig",
            ["allConfigues" => $allConfigues]
        );
    }
}