<?php


namespace Kamille\Mvc\LayoutProxy;


use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\Widget\Exception\WidgetException;

class LayoutProxy implements LayoutProxyInterface
{


    /**
     * @var LayoutInterface
     */
    private $layout;

    public function __construct()
    {
        // peanuts
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


    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onWidgetNotFound($name)
    {
        throw new WidgetException("Widget not found: $name");
    }
}


