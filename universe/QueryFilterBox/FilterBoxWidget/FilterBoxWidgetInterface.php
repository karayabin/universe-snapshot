<?php


namespace QueryFilterBox\FilterBoxWidget;


interface FilterBoxWidgetInterface
{
    /**
     * @return array, the model to render
     */
    public function getModel();
}