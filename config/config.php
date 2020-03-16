<?php

use Inert\ServiceLocator;

return [
    'actions' => [
        'index' => \Vrijeme3\Factory\IndexActionFactory::class,
        'purpleair' => \Vrijeme3\Factory\PurpleairActionFactory::class,
        'rhmzrs' => \Vrijeme3\Factory\RhmzrsActionFactory::class,
    ],
    'services' => [
        'curl' => function(ServiceLocator $serviceLocator) {
            return new \Vrijeme3\Curl();
        },
    ],
];
