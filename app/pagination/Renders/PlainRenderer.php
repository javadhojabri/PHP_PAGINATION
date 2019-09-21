<?php

namespace App\pagination\Renders;

use App\pagination\Meta;
use App\pagination\Renders\RendererAbstract;
use App\pagination\Renders\pageIterator;

class PlainRenderer extends RendererAbstract
{
    public function render()
    {
        $iterator = $this->pages();
        $html = "<ul>";

        if ($iterator->hasPrevious()) {
            $html .= "<li><a href=" . $this->query($this->meta->page() - 1) . " > Previous </a></li>";

        }

        foreach ($iterator as $page) {
            if ($iterator->iscurrentpage()) {
                $html .= "<strike><li><a href=" . $this->query($page) . " > $page </a></li> </strike>";
            } else {
                $html .= "<li><a href=" . $this->query($page) . " > $page </a></li>";

            }
        }
        if ($iterator->hasnext()) {
            $html .= "<li><a href=" . $this->query($this->meta->page() + 1) . " > next </a></li>";
        }
        $html .= "</ul>";
        return $html;
    }

    protected function query($page)
    {
        return "?page=" . $page;
    }

}