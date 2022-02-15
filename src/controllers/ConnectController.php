<?php

namespace ProjetPC\controllers;

use Slim\Psr7\Response;

class ConnectController extends AbstractController {

    public function connect(Response $response) {
        return $this->render(
            $response, 
            "connect.twig"
        );
    }

}