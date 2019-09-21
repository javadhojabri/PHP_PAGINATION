<?php

namespace App\pagination\Renders;

use App\pagination\Meta;
use Iterator;

class pageIterator implements Iterator
{
    protected $pages;
    protected $meta;
    protected $position = 0;

    public function __construct(array $pages, Meta $meta)
    {
        $this->pages = $pages;
        $this->meta = $meta;
    }

    public function hasPrevious()
    {
        if ($this->meta->page() <= 0) {
            return false;
        }
        return $this->meta->page() > 1;
    }

    public function hasnext()
    {
        return $this->meta->page() < $this->meta->lastPage();
    }

    public function iscurrentpage()
    {
        return $this->current() === $this->meta->page();
    }

    public function current()
    {
        return $this->pages[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function rewind()
    {
        return $this->position = 0;
    }

    public function valid()
    {
        return isset($this->pages[$this->position]);
    }
}