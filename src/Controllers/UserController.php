<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Doctrine\ORM\EntityManager;
use App\Entities\User;
use \Datetime;

class UserController
{
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function sayHello($request, $response)
    {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello2, $name");
        
        /*
        $user = new User();
        
        $user->setUserName($name);
        $user->setActive(true);
        $user->setCreatedAt(new Datetime);

        $entityManager = $this->entityManager;
        $entityManager->persist($user);
        $entityManager->flush();
        */


        return $response;
    }
}
