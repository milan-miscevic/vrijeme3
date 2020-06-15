<?php

declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

require(BASE_PATH . '/vendor/autoload.php');

$config = require(BASE_PATH . '/config/config.php');

(new Inert\Application($config))->run();
