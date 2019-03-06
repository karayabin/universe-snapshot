<?php


namespace Ling\Kamille\Mvc\LayoutProxy;


use Ling\Kamille\Mvc\Renderer\RendererInterface;

interface RendererAwareLayoutProxyInterface
{
    public function setRenderer(RendererInterface $renderer);
}