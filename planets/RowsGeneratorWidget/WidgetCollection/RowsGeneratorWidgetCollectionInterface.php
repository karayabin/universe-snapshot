<?php


namespace RowsGeneratorWidget\WidgetCollection;


use RowsGeneratorWidget\Widget\RowsGeneratorWidgetInterface;

interface RowsGeneratorWidgetCollectionInterface
{
    /**
     * @param $widgetName
     * @return RowsGeneratorWidgetInterface|false
     */
    public function getWidget($widgetName);
}