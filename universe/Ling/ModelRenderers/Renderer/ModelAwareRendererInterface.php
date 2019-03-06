<?php


namespace Ling\ModelRenderers\Renderer;


interface ModelAwareRendererInterface extends RendererInterface
{
    public function setModel(array $model);
}