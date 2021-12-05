[Back to the Ling/Light_Kit_DebugTrace api](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace.md)<br>
[Back to the Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService class](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService.md)


LightKitDebugTraceService::initialize
================



LightKitDebugTraceService::initialize — Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightKitDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




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
See the source code for method [LightKitDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/Service/LightKitDebugTraceService.php#L93-L134)


See Also
================

The [LightKitDebugTraceService](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/__construct.md)<br>Next method: [onRouteFound](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onRouteFound.md)<br>

