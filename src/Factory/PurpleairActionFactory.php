<?php

declare(strict_types=1);

namespace Vrijeme3\Factory;

use Inert\ServiceLocator;
use Vrijeme3\Curl;
use Vrijeme3\PurpleairAction;

class PurpleairActionFactory
{
    public function __invoke(ServiceLocator $serviceLocator): PurpleairAction
    {
        /** @var Curl $curl */
        $curl = $serviceLocator->get('curl');

        return new PurpleairAction($curl);
    }
}
