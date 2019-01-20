<?php


namespace Kamille\Utils\Exception;


/**
 *
 * A message intended for the gui user
 * (The user has done something wrong).
 *
 *
 * The idea of an user error exception is to display only
 * the message (i.e. not the trace as with a normal exception).
 *
 * In other words, we use the user error exception as a way
 * to signal an error in the application.
 * (exceptions are handy because they allow to jump over many
 * if and/or foreach blocks at once).
 *
 *
 */
class UserErrorException extends \Exception{

}