<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// database configuration parameters
$conn = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'refueling',
    'user' => 'root',
    'password' => 'antibiotikxc',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
