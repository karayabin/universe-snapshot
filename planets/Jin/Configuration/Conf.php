<?php


namespace Jin\Configuration;


use Bat\BDotTool;

/**
 * @info The Conf class is the main variable container in a jin app.
 * It contains all static variables:
 *
 * - appDir: the JIN_APP_DIR constant
 * - appProfile: the JIN_APP_PROFILE constant
 * - all the variables located inside the config/variables/ directory
 *
 */
class Conf
{
    /**
     * @info This property holds all the variables of this class.
     * @type array
     */
    protected $vars;


    /**
     * @info Constructs the class and initialze the empty vars array.
     */
    public function __construct()
    {
        $this->vars = [];
    }

    /**
     * @info Sets a key/value pair into the variable container.
     *
     * @param $key
     * @param mixed $value
     */
    public function setVar($key, $value)
    {
        $this->vars[$key] = $value;
    }


    /**
     * @info Set the initial variables. It replaces any existing variables.
     * @param array $vars
     */
    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /**
     * @info Returns the value stored at the given $key, or the $default value if not found.
     * The $key can use the bdot notation. See Bat\BdotTool class for more info.
     *
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $found = false;
        return BDotTool::getDotValue($key, $this->vars, $default, $found);
    }
}