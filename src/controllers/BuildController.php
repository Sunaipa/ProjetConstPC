<?php

namespace ProjetPC\controllers;

use Slim\Psr7\Response;
use ProjetPC\models\Boitier;

class BuildController extends AbstractController {

    public function build(Response $response) {
        /*
            TODO :faire de la composition a la place (mettre en param dans les fonctions ou besoin
            une instance du modele + Mettrenom table en params du contructeur du DAO)
        */
        return $this->render(
            $response, 
            "build.twig"
        );
    }
}