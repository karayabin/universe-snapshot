[Back to the Ling/Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md)<br>
[Back to the Ling\Light_404Logger\Service\Light404LoggerService class](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Service/Light404LoggerService.md)


Light404LoggerService::onExceptionCaught
================



Light404LoggerService::onExceptionCaught — The callable used to react to the [Light.on_unhandled_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [Light404LoggerService::onExceptionCaught](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Service/Light404LoggerService/onExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void




The callable used to react to the [Light.on_unhandled_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).

It will internally dispatch a logger message on the 404 channel,
using [the Light_Logger service](https://github.com/lingtalfi/Light_Logger), and we treat that message using a logger listener (Light404LoggerListener).

See the configuration of the Light404LoggerListener in the service configuration file.




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
See the source code for method [Light404LoggerService::onExceptionCaught](https://github.com/lingtalfi/Light_404Logger/blob/master/Service/Light404LoggerService.php#L29-L43)


See Also
================

The [Light404LoggerService](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Service/Light404LoggerService.md) class.



