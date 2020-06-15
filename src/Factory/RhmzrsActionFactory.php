<?php

declare(strict_types=1);

namespace Vrijeme3\Factory;

use Inert\ServiceLocator;
use Vrijeme3\RhmzrsAction;

class RhmzrsActionFactory
{
    public function __invoke(ServiceLocator $serviceLocator): RhmzrsAction
    {
        return new RhmzrsAction($serviceLocator->get('curl'));
    }
}
