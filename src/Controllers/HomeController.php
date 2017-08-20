<?php
namespace App\Controllers;

use \App\Controller;

class HomeController extends Controller
{
    public function home($request, $response, $args)
    {
        $response->getBody()->write("Bem vindo a API do PayMeLater! Considere uma das rotas abaixo:");

        return $response;
    }

    public function sayHello($request, $response, $args)
    {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello3, $name");

        return $response;
    }
}
