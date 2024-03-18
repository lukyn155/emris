<?php
// bin/doctrine

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// Adjust this path to your actual bootstrap.php
$path = __DIR__ . '/bootstrap.php';
echo "Path : $path";

require "$path";

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);
