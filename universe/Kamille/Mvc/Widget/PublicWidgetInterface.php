<?php


namespace Kamille\Mvc\Widget;


interface PublicWidgetInterface extends WidgetInterface
{
    public function getVariables();

    public function getTemplate();
}