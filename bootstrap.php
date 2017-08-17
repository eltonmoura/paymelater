<?php
define('APPLICATION_PATH', __DIR__);

require APPLICATION_PATH . '/vendor/autoload.php';
require APPLICATION_PATH . '/config/db-config.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [APPLICATION_PATH . '/src/Entities'];
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// $dbConfig : config/db-config.php
$entityManager = EntityManager::create($dbConfig, $config);
