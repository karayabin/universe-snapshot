<?php


namespace Kamille\Mvc\Theme\ThemeWidget\Renderer;


interface ThemeWidgetRendererInterface
{

    public function setModel(array $model);

    public function render();
}