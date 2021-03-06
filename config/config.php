<?php

declare(strict_types=1);

use Inert\ServiceLocator;
use Vrijeme3\Core\Curl;

return [
    'actions' => [
        'index' => \Vrijeme3\Action\IndexActionFactory::class,
        'purple-air' => \Vrijeme3\Action\PurpleairActionFactory::class,
        'rhmzrs' => \Vrijeme3\Action\RhmzrsActionFactory::class,
    ],
    'services' => [
        Curl::class => function (ServiceLocator $serviceLocator) {
            return new Curl();
        },
    ],
];
