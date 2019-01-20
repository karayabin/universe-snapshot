<?php


namespace Kamille\Mvc\Theme\ThemeWidget\Renderer;


abstract class BaseThemeWidgetRenderer implements ThemeWidgetRendererInterface
{

    protected $model;

    public function __construct()
    {
        $this->model = [];
    }

    public function setModel(array $model)
    {
        $this->model = $model;
        return $this;
    }

}