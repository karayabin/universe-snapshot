<?php

namespace SicTools\Exception;


/**
 * The SicBlockWillNotResolveException indicates that a sic block cannot resolve into a service.
 *
 * This exception is thrown:
 *
 * - by the SicTools\HotServiceResolver->getService method when the given sic block cannot be resolved into a service.
 *
 */
class SicBlockWillNotResolveException extends SicToolsException
{

}