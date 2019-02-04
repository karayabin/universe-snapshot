<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadRouteException class indicates that a problem occurred with the route returned by the router.
 *
 *
 * This includes the following cases:
 * - neither the controller nor the page mechanism have been defined
 *
 */
class JinBadRouteException extends JinBadConfigurationException
{

}