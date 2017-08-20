<?php
namespace App\Controllers;

use \App\Controller;
use \App\Entities\User;
use \Datetime;

class UserController extends Controller
{
    public function listAction($request, $response, $args)
    {
        $entityManager = $this->container->get('entityManager');
        $productRepository = $entityManager->getRepository(User::class);

        $users = $productRepository->findAll();

        return $response->withJson($users, self::HTTP_CODE_OK);
    }

    public function findAction($request, $response, $args)
    {
        $entityManager = $this->container->get('entityManager');
        $productRepository = $entityManager->getRepository(User::class);

        $user = $productRepository->find($args['id']);
        
        if ($user == null) {
            return $response->withJson('error', self::HTTP_CODE_NO_CONTENT);
        }

        return $response->withJson($user, self::HTTP_CODE_OK);
    }

    public function addAction($request, $response, $args)
    {
        $properties = $request->getParsedBody();

        // Esta propriedade não pode ser modificada
        if (isset($properties['id'])) {
            unset($properties['id']);
        }

        try {
            $user = User::fromArray($properties);

            // Preenchimento obrigatorio
            $user->setActive(true);
            $user->setCreatedAt(new Datetime);
            $user->setUpdatedAt(null);
        } catch (Exception $e) {
            $message = $e->getMessage();
            return $response->withJson(['error' => $message], self::HTTP_CODE_BAD_REQUEST);
        }

        try {
            $entityManager = $this->container->get('entityManager');
            $entityManager->persist($user);
            $entityManager->flush();
        } catch (Exception $e) {
            $message = $e->getMessage();
            return $response->withJson(['error' => $message], self::HTTP_CODE_INTERNAL_SERVER_ERROR);
        }

        return $response->withJson($user, self::HTTP_CODE_CREATED);
    }

    public function editAction($request, $response, $args)
    {
        $entityManager = $this->container->get('entityManager');
        $productRepository = $entityManager->getRepository(User::class);

        $user = $productRepository->find($args['id']);
        
        if ($user == null) {
            return $response->withJson('error', self::HTTP_CODE_NO_CONTENT);
        }

        $properties = $request->getParsedBody();

        $user->setUsername($properties['username']);
        $user->setPassword($properties['password']);
        $user->setFirstName($properties['firstName']);
        $user->setLastName($properties['lastName']);
        $user->setPhone($properties['phone']);
        $user->setEmail($properties['email']);
        $user->setAddres($properties['addres']);

        $user->setUpdatedAt(new Datetime);
        
        $entityManager->persist($user);
        $entityManager->flush();

        return $response->withJson($user, self::HTTP_CODE_OK);
    }

    public function deleteAction($request, $response, $args)
    {
        $entityManager = $this->container->get('entityManager');
        $productRepository = $entityManager->getRepository(User::class);

        $user = $productRepository->find($args['id']);

        if ($user == null) {
            return $response->withJson('error', self::HTTP_CODE_NO_CONTENT);
        }

        $user->setActive(false);
        $user->setUpdatedAt(new Datetime);

        $entityManager->persist($user);
        $entityManager->flush();

        return $response->withJson($user, self::HTTP_CODE_OK);
    }
}
