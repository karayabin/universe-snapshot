<?php


namespace Ling\Kamille\Mvc\Renderer;


use Ling\Kamille\Mvc\Layout\LayoutInterface;

interface LayoutRendererInterface extends RendererInterface
{

    public function setLayout(LayoutInterface $layout);
}