<?php

namespace App\pagination;

use  App\pagination\Meta;
use  App\pagination\Renders\PlainRenderer;

class Results
{
    protected $meta;
    protected $results;

    public function __construct(array $results, Meta $meta)
    {
        $this->meta = $meta;
        $this->results = (array)$results;
    }

    public function get()
    {
        return $this->results;
    }

    public function render()
    {
        return (new PlainRenderer($this->meta))->render();
    }

}