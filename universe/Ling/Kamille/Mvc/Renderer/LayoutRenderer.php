<?php


namespace Ling\Kamille\Mvc\Renderer;


use Ling\Kamille\Mvc\Layout\LayoutInterface;

abstract class LayoutRenderer implements LayoutRendererInterface
{


    protected $layout;



    public function setLayout(LayoutInterface $layout)
    {
        $this->layout = $layout;
        return $this;
    }
}