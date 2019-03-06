<?php


namespace Ling\Kamille\Mvc\WidgetInstanceDecorator;


use Ling\Kamille\Mvc\Widget\WidgetInterface;

interface WidgetInstanceDecoratorInterface
{

    public function decorate(WidgetInterface $widget, array $conf);

}