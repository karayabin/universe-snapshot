<?php


namespace Kamille\Mvc\LayoutProxy;


/**
 * A layout proxy is responsible for displaying widgets.
 *
 */
interface LayoutProxyInterface
{
    /**
     * Displays a widget
     */
    public function widget($widgetName);
}