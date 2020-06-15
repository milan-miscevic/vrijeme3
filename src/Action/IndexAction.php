<?php

declare(strict_types=1);

namespace Vrijeme3\Action;

use Inert\BaseAction;

class IndexAction extends BaseAction
{
    public function run(): void
    {
        $this->render('index');
    }
}
