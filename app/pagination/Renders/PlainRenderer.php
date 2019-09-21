<?php

namespace App\pagination\Renders;

use App\pagination\Meta;

class PlainRenderer
{

    protected $meta;

    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    public function render()
    {
        print_r($this->meta);
    }
}