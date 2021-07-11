<?php

declare(strict_types=1);

use Mmm\Inert\ActionContainer;
use Mmm\Inert\Application;
use Mmm\Inert\ServiceContainer;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

$config = require BASE_PATH . '/config/config.php';
$viewFolder = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view';

$actionContainer = new ActionContainer(
    $config['actions'],
    new ServiceContainer($config['services']),
    $viewFolder
);

(new Application($actionContainer, $viewFolder))->run();
