<?php

namespace ProjetPC\middleware;

use Exception;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\RequestInterface;

class CheckAutorisationMiddleware  {

    public function __construct(){
    }

    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)  {
        $response = $handler->handle($request); 

        if(!$_SESSION['autorisation'] <= 2){
           return $response->withStatus(302)->withHeader("location","/connect");
        }

        return $response;
    }
}