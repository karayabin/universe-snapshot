<?php


namespace Ling\Kamille\Utils\Laws\DynamicWidgetBinder\Listener;


interface DynamicWidgetBinderListenerInterface
{
    public function decorate($payload, array &$config);
}