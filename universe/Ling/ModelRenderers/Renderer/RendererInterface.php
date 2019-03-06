<?php


namespace Ling\ModelRenderers\Renderer;


interface RendererInterface
{
    /**
     * @return string, the rendered model
     */
    public function render();
}