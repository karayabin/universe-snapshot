<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadMaintenancePageException class indicates that a problem occurred with the maintenance page.
 *
 *
 * This includes the following cases:
 * - the page defined by in the configuration (config/app.yml) does not exist.
 *
 */
class JinBadMaintenancePageException extends JinBadConfigurationException
{

}