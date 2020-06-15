<?php

declare(strict_types=1);

namespace Vrijeme3\Factory;

use Inert\ServiceLocator;
use Vrijeme3\Curl;
use Vrijeme3\RhmzrsAction;

class RhmzrsActionFactory
{
    public function __invoke(ServiceLocator $serviceLocator): RhmzrsAction
    {
        /** @var Curl $curl */
        $curl = $serviceLocator->get('curl');

        return new RhmzrsAction($curl);
    }
}
