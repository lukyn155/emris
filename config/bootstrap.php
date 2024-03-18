<?php

// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . "/../vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
//$config = ORMSetup::createAttributeMetadataConfiguration(
//                paths: array(__DIR__ . "/../src"),
//                isDevMode: true,
//);

$config = ORMSetup::createAttributeMetadataConfiguration(
                paths: array(__DIR__ . "/../app/models"),
                isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection([
            'driver' => 'pdo_pgsql',
            'user' => 'jirka',
            'password' => 'Jirka',
            'dbname' => 'emris',
            'host' => 'localhost',
                ], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);