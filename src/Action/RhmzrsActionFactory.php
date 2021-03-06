<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Inert\BaseFactory;
use Inert\ServiceLocator;
use Vrijeme3\Core\Curl;

class RhmzrsActionFactory extends BaseFactory
{
    public function __invoke(ServiceLocator $serviceLocator): RhmzrsAction
    {
        /** @var Curl $curl */
        $curl = $serviceLocator->get(Curl::class);

        return new RhmzrsAction($curl);
    }
}
