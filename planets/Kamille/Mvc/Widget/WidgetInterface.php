<?php


namespace Kamille\Mvc\Widget;


interface WidgetInterface
{
    public function setVariables(array $variables);

    public function setTemplate($templateName);

    public function render();
}