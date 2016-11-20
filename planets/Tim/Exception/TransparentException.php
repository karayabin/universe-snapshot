<?php

namespace Tim\Exception;

/*
 * LingTalfi 2016-01-17
 * 
 * 
 * 
 * A transparent exception work in pair with an OpaqueTimServer.
 * By default, an exception's message is always intercepted by the opaque server and transformed to 
 * a general (opaque) message.
 * 
 * To add more flexibility to this system, the TransparentException's message is not caught by
 * the Opaque server.
 * 
 * It might be useful for a dev to have this capability in some cases...
 * 
 */
class TransparentException extends \Exception
{

}
