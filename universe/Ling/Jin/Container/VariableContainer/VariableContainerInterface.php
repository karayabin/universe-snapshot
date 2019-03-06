<?php


namespace Ling\Jin\Container\VariableContainer;


/**
 * The VariableContainerInterface interface defines a variable container in a jin application.
 * It's just a container for configuration variables.
 *
 * It contains all static variables:
 *
 * - appDir: the JIN_APP_DIR constant
 * - appProfile: the JIN_APP_PROFILE constant
 * - all the variables located inside the config/variables/ directory
 *
 *
 *
 */
interface VariableContainerInterface
{


    /**
     * Sets a key/value pair into the variable container.
     *
     * @param $key
     * @param mixed $value
     */
    public function setVar($key, $value);

    /**
     * Set all the variables at once. This replaces any existing variables.
     *
     *
     * @param array $vars
     */
    public function setVars(array $vars);


    /**
     * Returns the value stored at the given $key, or the $default value if not found.
     *
     * The $key can use the [bdot notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md).
     *
     *
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);
}