<?php

namespace Vrijeme3;

use Inert\Action;

class IndexAction extends Action
{
    public function run(): void
    {
        $this->render('index');
    }
}
