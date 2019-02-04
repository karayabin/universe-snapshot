<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadControllerException class indicates that a problem occurred with the page mechanism of the controller.
 *
 *
 * This includes the following cases:
 * - an argument declared in the controller was not found in the route variables
 * - the controller given by the route is invalid (not a valid callable or not a Jin\Controller\Controller instance)
 * - the controller didn't return an http response
 *
 */
class JinBadControllerException extends JinBadConfigurationException
{

}