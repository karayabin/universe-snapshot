[Back to the Ling/Light_ExceptionHandler api](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler.md)<br>
[Back to the Ling\Light_ExceptionHandler\Service\LightExceptionHandlerService class](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Service/LightExceptionHandlerService.md)


LightExceptionHandlerService::onExceptionCaught
================



LightExceptionHandlerService::onExceptionCaught — The callable used to react to some events (see the service configuration for more details).




Description
================


public [LightExceptionHandlerService::onExceptionCaught](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Service/LightExceptionHandlerService/onExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void




The callable used to react to some events (see the service configuration for more details).

It will internally dispatch a logger message on the exception channel,
using [the Light_Logger service](https://github.com/lingtalfi/Light_Logger).

Also, by default this plugin provides a logger listener which writes the exception traces
in a log file, which is by default in: ${app_dir}/log/exception.txt.




Parameters
================


- event

    

- eventName

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightExceptionHandlerService::onExceptionCaught](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/Service/LightExceptionHandlerService.php#L32-L41)


See Also
================

The [LightExceptionHandlerService](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Service/LightExceptionHandlerService.md) class.



