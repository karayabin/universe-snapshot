<?php


namespace Kamille\Mvc\Layout;


use Kamille\Mvc\Renderer\Exception\RendererException;
use Kamille\Mvc\Widget\WidgetInterface;

interface LayoutInterface
{

    public function setTemplate($templateName);

    public function bindWidget($name, WidgetInterface $widget);

    /**
     * @throws RendererException, if throwEx is set to true and the widget is not found
     * @return WidgetInterface
     */
    public function getWidget($name, $default = null, $throwEx = false);

    /**
     *
     *
     * @return WidgetInterface[], array of widgetId => widget
     */
    public function getWidgets();

    /**
     * @throws RendererException, if the template is not set
     * @param array $variables
     * @return string
     */
    public function render(array $variables = []);

}