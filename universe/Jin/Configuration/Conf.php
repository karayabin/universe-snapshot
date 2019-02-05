<?php


namespace Jin\Configuration;


use Bat\BDotTool;
use Jin\Container\VariableContainer\VariableContainerInterface;

/**
 * The Conf class is the dynamic variation of the VariableContainerInterface interface.
 *
 * It's used for development as it is recreated every time (i.e. no cache).
 */
class Conf implements VariableContainerInterface
{
    /**
     * @info This property holds all the variables of this class.
     * @type array
     */
    protected $vars;


    /**
     * @info Constructs the class and initializes the empty vars array.
     */
    public function __construct()
    {
        $this->vars = [];
    }

    /**
     * @implementation
     */
    public function setVar($key, $value)
    {
        $this->vars[$key] = $value;
    }


    /**
     * @implementation
     */
    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /**
     * @implementation
     */
    public function get($key, $default = null)
    {
        $found = false;
        return BDotTool::getDotValue($key, $this->vars, $default, $found);
    }
}