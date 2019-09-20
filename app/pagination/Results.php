<?php

namespace App\pagination;

use  App\pagination\Meta;

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

    }

}