<?php


namespace Kamille\Mvc\WidgetDecorator;


use Kamille\Mvc\Widget\WidgetInterface;

/**
 * To decorate a widget when you display multiple widgets on the same position,
 * using the LawsProxy.position method.
 */
interface WidgetDecoratorInterface
{
    /**
     * @param $content: string, the content to decorate
     * @param $positionName: string, the name of the position actually being rendered
     * @param $widgetId: string, the id of the widget to decorate (as defined in the laws configuration file)
     * @param $index: int, the index representing the current widget being iterated (in the foreach loop)
     * @param WidgetInterface $widget, the widget instance
     * @param array $config: the full laws configuration array
     * @return void
     */
    public function decorate(&$content, $positionName, $widgetId, $index, WidgetInterface $widget, array $config);
}