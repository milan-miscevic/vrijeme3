<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Inert\BaseFactory;
use Inert\ServiceLocator;

class IndexActionFactory extends BaseFactory
{
    public function __invoke(ServiceLocator $serviceLocator): IndexAction
    {
        return new IndexAction();
    }
}
