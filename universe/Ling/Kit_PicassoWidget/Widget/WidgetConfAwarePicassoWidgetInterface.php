<?php

namespace Ling\Kit_PicassoWidget\Widget;


/**
 * The WidgetConfAwarePicassoWidgetInterface interface.
 *
 * A Picasso widget by default only receives the "vars" part of the widget configuration.
 * To access the full widget configuration array, a picasso widget must implement this class.
 *
 */
interface WidgetConfAwarePicassoWidgetInterface
{


    /**
     * Sets the widget configuration.
     *
     * @param array $widgetConf
     */
    public function setWidgetConf(array $widgetConf);


    /**
     * Returns the widget configuration.
     *
     * @return array
     */
    public function getWidgetConf(): array;
}