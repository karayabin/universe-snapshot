<?php


namespace Kamille\Mvc\Renderer;


use Kamille\Mvc\Layout\LayoutInterface;

interface LayoutRendererInterface extends RendererInterface
{

    public function setLayout(LayoutInterface $layout);
}