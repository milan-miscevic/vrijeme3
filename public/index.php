<?php

declare(strict_types=1);

use Inert\ActionLocator;
use Inert\Application;
use Inert\ServiceLocator;

define('BASE_PATH', dirname(__DIR__));

require(BASE_PATH . '/vendor/autoload.php');

$config = require(BASE_PATH . '/config/config.php');
$viewFolder = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view';

$actionLocator = new ActionLocator(
    $config['actions'],
    new ServiceLocator($config['services']),
    $viewFolder
);

(new Application($actionLocator, $viewFolder))->run();
