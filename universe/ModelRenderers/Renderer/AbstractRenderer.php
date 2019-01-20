<?php


namespace ModelRenderers\Renderer;


abstract class AbstractRenderer implements ModelAwareRendererInterface
{
    protected $model;

    public function setModel(array $model)
    {
        $this->model = $model;
        return $this;
    }
}