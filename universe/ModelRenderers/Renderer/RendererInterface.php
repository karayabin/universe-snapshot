<?php


namespace ModelRenderers\Renderer;


interface RendererInterface
{
    /**
     * @return string, the rendered model
     */
    public function render();
}