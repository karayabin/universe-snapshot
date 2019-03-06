<?php


namespace Ling\SimplePdoWrapper\Exception;


/**
 * The NoPdoConnectionException class is thrown to indicate that the SimplePdoWrapper instance doesn't have
 * a connection (php PDO object) to work with.
 * The problem is generally fixed by setting the connection with the setConnection method.
 *
 */
class NoPdoConnectionException extends SimplePdoWrapperException
{
    
}