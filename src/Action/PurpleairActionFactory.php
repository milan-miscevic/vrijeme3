<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Action;

use Mmm\Inert\ActionFactory;
use Mmm\Inert\ServiceContainer;
use Mmm\Vrijeme3\Core\Curl;

class PurpleairActionFactory implements ActionFactory
{
    public function __invoke(ServiceContainer $serviceContainer): PurpleairAction
    {
        /** @var Curl $curl */
        $curl = $serviceContainer->get(Curl::class);

        return new PurpleairAction($curl);
    }
}
