[Back to the Ling/Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md)<br>
[Back to the Ling\Light_DebugTrace\Service\LightDebugTraceService class](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md)


LightDebugTraceService::initialize
================



LightDebugTraceService::initialize — Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightDebugTraceService::initialize](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
It will write information about the http request and the csrf token into the debug trace file.




Parameters
================


- event

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDebugTraceService::initialize](https://github.com/lingtalfi/Light_DebugTrace/blob/master/Service/LightDebugTraceService.php#L93-L136)


See Also
================

The [LightDebugTraceService](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/__construct.md)<br>Next method: [onRouteFound](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onRouteFound.md)<br>

