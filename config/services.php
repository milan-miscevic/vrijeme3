<?php

declare(strict_types=1);

use Mmm\Inert\ServiceContainer;
use Vrijeme3\Core\Curl;

return [
    Curl::class => function (ServiceContainer $serviceContainer) {
        return new Curl();
    },
];
