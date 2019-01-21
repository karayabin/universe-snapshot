<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadControllerException class indicates that a problem occurred with the page mechanism of the controller.
 *
 *
 * This includes the following cases:
 * - the controller could not be instantiated
 * - the controller did not return a Jin\Http\HttpResponse instance
 *
 */
class JinBadControllerException extends JinBadConfigurationException
{

}