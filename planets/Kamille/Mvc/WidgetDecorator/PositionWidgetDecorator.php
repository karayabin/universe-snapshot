<?php


namespace Kamille\Mvc\WidgetDecorator;


use Kamille\Mvc\Widget\WidgetInterface;

/**
 * This decorator allows you to make a simple wrapping around your widgets.
 *
 * To use this decorator, open the laws configuration file,
 * and add a "positions" key, which is an array of "position name" => decorator.
 *
 * The wildcard * can be used as a fallback for any position.
 *
 *
 * The decorator can be one of the following:
 *
 *
 * - callable: fn ( &s )
 *              s: string, the content of the widget to decorate
 *
 *
 *
 *
 */
class PositionWidgetDecorator implements WidgetDecoratorInterface
{


    public static function create()
    {
        return new static();
    }

    public function decorate(&$content, $positionName, $widgetId, $index, WidgetInterface $widget, array $config)
    {
        if (false !== ($decorator = $this->getDecorator($positionName, $config))) {
            // interpreting the decorator
            if (is_callable($decorator)) {
                $content = call_user_func($decorator, $content);
            }
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getDecorator($positionName, array $config)
    {
        if (array_key_exists("positions", $config)) {
            $config = $config['positions'];
            if (array_key_exists($positionName, $config)) {
                return $config[$positionName];
            } elseif (array_key_exists("*", $config)) {
                return $config["*"];
            }
        }
        return false;
    }

}