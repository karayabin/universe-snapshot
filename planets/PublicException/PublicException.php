<?php


namespace PublicException;

/**
 * A public exception is an exception which message is intended to be displayed in the gui for the user.
 * Therefore, it should not contain sensible data like secret file paths, passwords, etc....
 *
 */
class PublicException extends \Exception
{

}