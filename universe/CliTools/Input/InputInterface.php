<?php


namespace CliTools\Input;


/**
 * The InputInterface class.
 * It represents the command line as described by @page(the command line page).
 *
 * The main input classes are:
 *
 * - the @object(array input)
 * - the @object(command line input)
 *
 *
 */
interface InputInterface
{

    /**
     * Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
     *
     * @param int $index
     * @param null $default
     * @return mixed|null
     */
    public function getParameter(int $index, $default = null);

    /**
     * Returns the value of the option $optionName if set, or the $default value if the option was not defined.
     *
     * @param string $optionName
     * @param null $default
     * @return mixed|null
     */
    public function getOption(string $optionName, $default = null);

    /**
     * Returns whether the flag $flagName was set.
     *
     * @param string $flagName
     * @return bool
     */
    public function hasFlag(string $flagName): bool;

}