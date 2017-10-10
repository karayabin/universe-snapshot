<?php


namespace Kamille\Mvc\WidgetInstanceDecorator;


use Kamille\Mvc\Widget\WidgetInterface;

interface WidgetInstanceDecoratorInterface
{

    public function decorate(WidgetInterface $widget, array $conf);

}