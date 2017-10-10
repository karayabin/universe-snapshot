<?php


namespace Kamille\Mvc\LayoutProxy;


use Kamille\Mvc\Renderer\RendererInterface;

interface RendererAwareLayoutProxyInterface
{
    public function setRenderer(RendererInterface $renderer);
}