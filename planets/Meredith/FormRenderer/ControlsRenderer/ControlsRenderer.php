<?php

namespace Meredith\FormRenderer\ControlsRenderer;

use Meredith\FormRenderer\ControlsRenderer\Control\ControlInterface;

/**
 * LingTalfi 2015-12-31
 */
abstract class ControlsRenderer implements ControlsRendererInterface
{

    /**
     * @var ControlInterface[]
     */
    private $controls;

    abstract protected function renderControl(ControlInterface $control);

    public function __construct()
    {
        $this->controls = [];
    }


    public static function create()
    {
        return new static();
    }

    public function render()
    {
        ob_start();
        foreach ($this->controls as $control) {
            echo $this->renderControl($control);
        }
        return ob_get_clean();
    }

    public function addControl(ControlInterface $c)
    {
        $this->controls[] = $c;
        return $this;
    }

    protected function log($m)
    {
        trigger_error($m, \E_USER_WARNING);
    }

}