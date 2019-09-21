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
        $lrcount = 2;
        $range = range(1, $this->meta->lastPage());
        $enddiifference = max(0, $this->meta->page() - ($this->meta->lastPage() - $lrcount) + 1);
        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page() - $lrcount) - $enddiifference)), 0, ($lrcount * 2));
        array_unshift($range, 1);
        $range[] = $this->meta->lastPage();
        return array_unique($range);
    }

}