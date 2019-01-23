<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;

/**
 *
 * @info The JinBadLoggerException class indicates that a problem occurred at the main logger instance.
 *
 *
 * This includes the following cases:
 * - the log file given by the logger configuration is actually a directory
 *
 */
class JinBadLoggerException extends JinBadConfigurationException
{

}