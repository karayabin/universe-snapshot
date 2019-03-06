<?php


namespace Ling\CliTools\Input;


/**
 * The AbstractInput class is a base class that abstracts the base logic for an InputInterface implementation.
 *
 */
abstract class AbstractInput implements InputInterface
{


    /**
     * This property holds the array of set flags.
     * It's an array of key => true
     *
     * @var array
     */
    protected $flags;


    /**
     * This property holds the values of the options passed to the program.
     *
     * It's an array of key => value
     *
     * @var array
     */
    protected $options;


    /**
     * This property holds the parameters passed to the program.
     *
     * It's an array of index => value, with index starting at 1.
     * Parameters are registered in order from left to right.
     *
     * @var array
     */
    protected $parameters;


    /**
     * Builds the class instance.
     */
    public function __construct()
    {
        $this->flags = [];
        $this->options = [];
        $this->parameters = [];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function hasFlag(string $flagName): bool
    {
        if (array_key_exists($flagName, $this->flags)) {
            return $this->flags[$flagName];
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getOption(string $optionName, $default = null)
    {
        if (array_key_exists($optionName, $this->options)) {
            return $this->options[$optionName];
        }
        return $default;
    }

    /**
     * @implementation
     */
    public function getParameter(int $index, $default = null)
    {
        if (array_key_exists($index, $this->parameters)) {
            return $this->parameters[$index];
        }
        return $default;
    }

    /**
     * @implementation
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @implementation
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @implementation
     */
    public function getFlags(): array
    {
        return array_keys($this->flags);
    }


}