<?php


namespace Kamille\Mvc\Widget;


use Kamille\Mvc\Layout\LayoutInterface;

class GroupWidget extends Widget implements LayoutAwareWidgetInterface
{
    private $widgets;
    /**
     * @var LayoutInterface
     */
    private $layout;

    public function __construct()
    {
        parent::__construct();
        $this->widgets = [];
    }

    public function setLayout(LayoutInterface $layout)
    {
        $this->layout = $layout;
    }




    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function bindWidget($name, WidgetInterface $widget)
    {
        $this->widgets[] = [$name, $widget];
        return $this;
    }

    public function render()
    {
        $this->variables['widgets'] = [];
        foreach ($this->widgets as $item) {
            $this->layout->bindWidget($item[0], $item[1]);
            $this->variables['widgets'][] = $item[0];
        }
        return parent::render();
    }


}