<?php

declare(strict_types=1);

use Mmm\Inert\ServiceContainer;
use Vrijeme3\Core\Curl;

return [
    'actions' => [
        'index' => \Vrijeme3\Action\IndexActionFactory::class,
        'purple-air' => \Vrijeme3\Action\PurpleairActionFactory::class,
        'rhmzrs' => \Vrijeme3\Action\RhmzrsActionFactory::class,
    ],
    'services' => [
        Curl::class => function (ServiceContainer $serviceContainer) {
            return new Curl();
        },
    ],
];
