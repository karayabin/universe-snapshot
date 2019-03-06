<?php


namespace Ling\Registry;


/**
 * The RegistryInterface interface defines a jin application registry.
 *
 * The role of such a registry is to allow objects used by the application to communicate
 * between them using variables.
 *
 *
 */
interface RegistryInterface
{

    /**
     * Returns whether the registry contains the variable $key.
     *
     * @param $key
     * @return bool
     */
    public function has($key);

    /**
     * Returns the value associated with the given $key,
     * or the $default value otherwise.
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);


    /**
     * Sets the $key to the $value in the registry.
     *
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function set($key, $value);

}