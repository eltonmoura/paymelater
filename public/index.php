<?php
require_once __DIR__ . '/../bootstrap.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers\UserController;

$appConfig = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$container = new \Slim\Container($appConfig);

$app = new \Slim\App($container);

// Routes -----------------------------------------------------------

$app->get('/', function () {
    print 'Nenhuma rota definida';
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    global $entityManager;
    $userController = new UserController($entityManager);
    $userController->sayHello($request, $response);
});

// ------------------------------------------------------------------

$app->run();
