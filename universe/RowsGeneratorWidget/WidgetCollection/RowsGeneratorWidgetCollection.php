<?php


namespace RowsGeneratorWidget\WidgetCollection;


use RowsGeneratorWidget\Widget\RowsGeneratorWidgetInterface;

class RowsGeneratorWidgetCollection implements RowsGeneratorWidgetCollectionInterface
{

    private $widgets;


    public function __construct()
    {
        $this->widgets = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     * @param $widgetName
     * @return RowsGeneratorWidgetInterface|false
     */
    public function getWidget($widgetName)
    {
        if (array_key_exists($widgetName, $this->widgets)) {
            return $this->widgets[$widgetName];
        }
        return false;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param $name
     * @param RowsGeneratorWidgetInterface $widget
     * @return RowsGeneratorWidgetCollectionInterface
     */
    public function setWidget($name, RowsGeneratorWidgetInterface $widget)
    {
        $this->widgets[$name] = $widget;
        return $this;
    }
}