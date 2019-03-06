<?php


namespace Ling\CliTools\Exception;


/**
 * The InvalidContextException exception is thrown in the following cases:
 *
 * - the CliTools\Io\Input object was not able to detect the argv key in the $_SERVER array,
 *          probably meaning that it was executed from a web context instead of a cli context.
 *
 */
class InvalidContextException extends CliToolsException
{

}