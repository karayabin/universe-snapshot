<?php


namespace Ling\Kit\WidgetConfDecorator;


/**
 * The WidgetConfDecoratorInterface interface.
 */
interface WidgetConfDecoratorInterface
{

    /**
     * Decorates the given widget configuration array.
     *
     * @param array $widgetConf
     */
    public function decorate(array &$widgetConf);
}