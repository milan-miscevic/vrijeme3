<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Mmm\Inert\ActionFactory;
use Mmm\Inert\ServiceContainer;

class IndexActionFactory implements ActionFactory
{
    public function __invoke(ServiceContainer $serviceContainer): IndexAction
    {
        return new IndexAction();
    }
}
