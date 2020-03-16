<?php

namespace Vrijeme3\Factory;

use Inert\ServiceLocator;
use Vrijeme3\PurpleairAction;

class PurpleairActionFactory
{
    public function __invoke(ServiceLocator $serviceLocator): PurpleairAction
    {
        return new PurpleairAction($serviceLocator->get('curl'));
    }
}
