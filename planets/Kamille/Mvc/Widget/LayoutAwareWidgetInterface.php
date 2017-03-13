<?php


namespace Kamille\Mvc\Widget;


use Kamille\Mvc\Layout\LayoutInterface;

interface LayoutAwareWidgetInterface extends WidgetInterface
{
    public function setLayout(LayoutInterface $layout);
}