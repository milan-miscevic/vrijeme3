<?php

declare(strict_types=1);

namespace Vrijeme3\Factory;

use Inert\ServiceLocator;
use Vrijeme3\IndexAction;

class IndexActionFactory
{
    public function __invoke(ServiceLocator $serviceLocator): IndexAction
    {
        return new IndexAction();
    }
}
