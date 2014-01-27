<?php

define('APP_FOLDER', dirname(__DIR__));

if (!defined('PHPUNIT_TESTSUITE')) {
    $confjson = file_get_contents(__DIR__ . '/production.json');
    $dev = false;
} else {
    $confjson = file_get_contents(__DIR__ . '/developement.json');
    $dev = true;
}

$conf = json_decode($confjson);

$database = APP_FOLDER . '/db/' . $conf->database;
/*
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(APP_FOLDER . "/src"), $isDevMode);

$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => $database,
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
*/