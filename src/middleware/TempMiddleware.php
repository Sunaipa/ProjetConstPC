<?php

namespace ProjetPC\middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\RequestInterface;

class TempMiddleware  {
    

    public function __construct(){
    }

    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)  {

        // $key = filter_input(INPUT_GET, "key");
        // if($key != $this->key1) {
        //     throw new \Exception("Clef non valide"); 
        // }
        $response = $handler->handle($request);
        return $response;



        /*
            TODO GESTION DE SESSION / verif si connecté
        */
    }
}