<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Mmm\Inert\BaseAction;
use Mmm\Inert\Response;

class IndexAction extends BaseAction
{
    public function run(): Response
    {
        return $this->render('index');
    }
}
