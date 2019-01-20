<?php


namespace Kamille\Mvc\LayoutProxy;


use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\Widget\Exception\WidgetException;

class DebugLayoutProxy extends LayoutProxy
{


    protected function onWidgetException(\Exception $e, $widgetName)
    {
        throw $e;
    }
}


