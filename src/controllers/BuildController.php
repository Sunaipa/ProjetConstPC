<?php

namespace ProjetPC\controllers;

use Slim\Psr7\Response;
use ProjetPC\models\Boitier;

class BuildController extends AbstractController {

    public function formDisplay(Response $response) {
            
        return $this->render(
            $response, 
            "build.twig"
        );
    }

    public function formProcess(Response  $response) {

        return ""; // redirection page "mes builds"
    }
}