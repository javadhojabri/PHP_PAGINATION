<?php

namespace App\pagination\Renders;

use App\pagination\Meta;
use App\pagination\Renders\RendererAbstract;
class PlainRenderer extends RendererAbstract
{
    public function render()
    {
        $this->pages();
    }
}