<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadPageException class indicates that a problem occurred with the page mechanism of the router.
 *
 *
 * This includes the following cases:
 * - the page defined by a route doesn't reference an existing file
 * - the file referenced by the page is not located under the pages directory
 *
 */
class JinBadPageException extends JinBadConfigurationException
{

}