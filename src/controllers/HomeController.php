<?php

namespace ProjetPC\controllers;

use Slim\Psr7\Response;
use ProjetPC\controllers\AbstractController;

class HomeController extends AbstractController {

    public function home(Response $response){
        return $this->render(
            $response, 
            "home.twig"
        );
    }
}