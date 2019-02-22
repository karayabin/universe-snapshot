<?php


namespace DocTools\Widget;



/**
 * A base widget that every widget can extend.
 */
abstract class Widget implements WidgetInterface
{

    /**
     * This property holds an array of options to use. Options affect the behaviour of the instance and
     * are specific to the concrete class.
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the Widget instance.
     */
    public function __construct()
    {
        $this->options = [];
    }


    /**
     * Sets the options for this widget instance.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}