<?php


namespace Ling\Kamille\Mvc\LayoutProxy;


use Ling\Kamille\Mvc\Layout\LayoutInterface;
use Ling\Kamille\Mvc\Widget\Exception\WidgetException;

class DebugLayoutProxy extends LayoutProxy
{


    protected function onWidgetException(\Exception $e, $widgetName)
    {
        throw $e;
    }
}


