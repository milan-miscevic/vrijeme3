<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Inert\BaseAction;
use Inert\Response;

class IndexAction extends BaseAction
{
    public function run(): Response
    {
        return $this->render('index');
    }
}
