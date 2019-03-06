<?php


namespace Ling\Kamille\Mvc\Widget;


use Ling\Kamille\Mvc\Layout\LayoutInterface;

interface LayoutAwareWidgetInterface extends WidgetInterface
{
    public function setLayout(LayoutInterface $layout);
}