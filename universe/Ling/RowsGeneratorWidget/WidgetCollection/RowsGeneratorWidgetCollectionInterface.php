<?php


namespace Ling\RowsGeneratorWidget\WidgetCollection;


use Ling\RowsGeneratorWidget\Widget\RowsGeneratorWidgetInterface;

interface RowsGeneratorWidgetCollectionInterface
{
    /**
     * @param $widgetName
     * @return RowsGeneratorWidgetInterface|false
     */
    public function getWidget($widgetName);
}