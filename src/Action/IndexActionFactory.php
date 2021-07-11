<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Mmm\Inert\BaseActionFactory;
use Mmm\Inert\ServiceContainer;

class IndexActionFactory extends BaseActionFactory
{
    public function __invoke(ServiceContainer $serviceContainer): IndexAction
    {
        return new IndexAction();
    }
}
