<?php
require_once __DIR__ . '/../bootstrap.php';

use \App\Controllers\HomeController;
use \App\Controllers\UserController;

$appConfig = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$container = new \Slim\Container($appConfig);

$container['entityManager'] = $entityManager;

$app = new \Slim\App($container);

// Routes -----------------------------------------------------------

// Home

$app->get('/', HomeController::class . ':home');

$app->get('/hello/{name}', HomeController::class . ':sayHello');

// User

$app->get('/user', UserController::class . ':listAction');

$app->post('/user', UserController::class . ':addAction');

$app->get('/user/{id}', UserController::class . ':findAction');

$app->put('/user/{id}', UserController::class . ':editAction');

$app->delete('/user/{id}', UserController::class . ':deleteAction');

// ------------------------------------------------------------------

$app->run();
