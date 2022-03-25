<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Mmm\Inert\ActionFactory;
use Mmm\Inert\ServiceContainer;
use Vrijeme3\Core\Curl;

class RhmzrsActionFactory implements ActionFactory
{
    public function __invoke(ServiceContainer $serviceContainer): RhmzrsAction
    {
        /** @var Curl $curl */
        $curl = $serviceContainer->get(Curl::class);

        return new RhmzrsAction($curl);
    }
}
