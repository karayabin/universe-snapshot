<?php


namespace ModelRenderers\Renderer;


interface ModelAwareRendererInterface extends RendererInterface
{
    public function setModel(array $model);
}