<?php


namespace Ling\Registry;


/**
 * The Registry class is the main implementation of the RegistryInterface in a jin app.
 */
class Registry implements RegistryInterface
{

    /**
     * This property holds all the variables used by this instance.
     *
     * @var array
     */
    protected $vars;


    /**
     * Builds the instance.
     */
    public function __construct()
    {
        $this->vars = [];
    }

    /**
     * @implementation
     */
    public function has($key)
    {
        return array_key_exists($key, $this->vars);
    }

    /**
     * @implementation
     */
    public function get($key, $default = null)
    {
        return $this->vars[$key] ?? $default;
    }

    /**
     * @implementation
     */
    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }

}