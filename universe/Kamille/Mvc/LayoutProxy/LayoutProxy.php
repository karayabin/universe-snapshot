<?php


namespace Kamille\Mvc\LayoutProxy;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Mvc\Layout\LayoutAwareInterface;
use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Services\XLog;

class LayoutProxy implements LayoutProxyInterface, LayoutAwareInterface
{


    /**
     * @var LayoutInterface
     */
    protected $layout;

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
        if (null !== ($widget = $this->layout->getWidget($name))) {
            echo $widget->render();
        } else {
            echo $this->onWidgetNotFound($name);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * If the widget if not found, we return an empty string,
     * so that the layout can still render the other widgets...
     */
    protected function onWidgetNotFound($name)
    {

        $msg = "Widget not found: $name";
        $log = "LayoutProxy: " . $msg;
        XLog::error($log);
        if (true === ApplicationParameters::get("debug")) {
            return "debug: " . $msg;
        }
        return "";
    }
}


