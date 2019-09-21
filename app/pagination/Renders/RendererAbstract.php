<?php

namespace App\pagination\Renders;

use App\pagination\Meta;
use App\pagination\Renders\pageIterator;

abstract class RendererAbstract
{
    protected $meta;

    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    public function pages()
    {
        $lrcount = 2;
        $range = range(1, $this->meta->lastPage());
        $enddiifference = max(0, $this->meta->page() - ($this->meta->lastPage() - $lrcount) + 1);
        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page() - $lrcount) - $enddiifference)), 0, ($lrcount * 2));
        array_unshift($range, 1);
        $range[] = $this->meta->lastPage();
        return new pageIterator(array_unique($range), $this->meta);
    }

    abstract public function render();
}