<?php


namespace Kamille\Mvc\Widget;


/**
 * A widget is an element you can place on a page.
 *
 * It displays some variables via a template.
 *
 */
interface WidgetInterface
{
    public function setVariables(array $variables);

    public function setTemplate($templateName);

    public function render();
}