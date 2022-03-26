<?php

declare(strict_types=1);

use Mmm\Inert\ActionContainer;
use Mmm\Inert\ActionFactory;
use Mmm\Inert\Application;
use Mmm\Inert\ServiceContainer;

define('BASE_PATH', dirname(__DIR__));

/** @psalm-suppress UnresolvableInclude */
require BASE_PATH . '/vendor/autoload.php';

/**
 * @var class-string<ActionFactory>[] $actions
 * @psalm-suppress UnresolvableInclude
 */
$actions = require BASE_PATH . '/config/actions.php';
/**
 * @var class-string[] $services
 * @psalm-suppress UnresolvableInclude
 */
$services = require BASE_PATH . '/config/services.php';
$viewFolder = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view';

$actionContainer = new ActionContainer(
    $actions,
    new ServiceContainer($services),
    $viewFolder
);

(new Application($actionContainer, $viewFolder))->run()->render();
