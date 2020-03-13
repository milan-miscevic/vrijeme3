<?php

use Inert\ServiceLocator;

return [
    'actions' => [
        'index' => \Vrijeme3\Factory\IndexActionFactory::class,
    ],
    'services' => [
        'curl' => function(ServiceLocator $serviceLocator) {
            return new \Vrijeme3\Curl();
        },
    ],
];
