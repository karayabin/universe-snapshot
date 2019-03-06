<?php


namespace Ling\Jin\Exception\BadConfiguration;


use Ling\Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadPageException class indicates that a problem occurred with the page mechanism of the router.
 *
 *
 * This includes the following cases:
 * - the page parameters defined by the route are incorrect and don't lead to the creation of a valid http response.
 *
 */
class JinBadPageException extends JinBadConfigurationException
{

}