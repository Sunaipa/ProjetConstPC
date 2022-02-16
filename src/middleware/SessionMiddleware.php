<?php

namespace ProjetPC\middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\RequestInterface;

class SessionMiddleware  {
    

    public function __construct(){
    }

    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)  {
         

        //Check si la session a un profil associé
        if(!array_key_exists('autorisation', $_SESSION)){
            //identifie la session en tant qu'annonyme
            $_SESSION['autorisation'] = 3;
            $_SESSION['pseudo'] = 'ANON';
        }
 
        $response = $handler->handle($request);        
        return $response;
        /*
            TODO GESTION DE SESSION / verif si connecté
        */
    }
}