<?php


namespace Kamille\Mvc\LayoutProxy;


use Kamille\Mvc\Layout\LayoutAwareInterface;
use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\Widget\Exception\WidgetException;

class LayoutProxy implements LayoutProxyInterface, LayoutAwareInterface
{


    /**
     * @var LayoutInterface
     */
    private $layout;

    public function __construct()
    {
        // peanuts
    }

    public static function create()
    {
        return new static();
    }

    public function setLayout(LayoutInterface $layout)
    {
        $this->layout = $layout;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function widget($name)
    {
        try {

            if (null !== ($widget = $this->layout->getWidget($name))) {
                echo $widget->render();
            } else {
                $this->onWidgetNotFound($name);
                /**
                 * If the widget if not found, we return an empty string,
                 * so that the layout can still render the other widgets...
                 */
                echo "";
            }

        } catch (\Exception $e) {
            echo $this->onWidgetException($e, $name);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onWidgetNotFound($name)
    {
        throw new WidgetException("Widget not found: $name");
    }

    protected function onWidgetException(\Exception $e, $widgetName)
    {
        return "Problem with rendering the widget $widgetName";
    }
}


