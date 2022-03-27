<?php

declare(strict_types=1);

namespace Mmm\Vrijeme3\Action;

use Mmm\Inert\Action;
use Mmm\Inert\Renderable;
use Mmm\Inert\RenderableTrait;
use Mmm\Inert\Response;

class IndexAction implements Action, Renderable
{
    use RenderableTrait;

    public function run(): Response
    {
        return $this->render('index');
    }
}
