[Back to the Ling/Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md)<br>
[Back to the Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService class](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService.md)


LightKitAdminDebugTraceService::initialize
================



LightKitAdminDebugTraceService::initialize — Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightKitAdminDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
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
See the source code for method [LightKitAdminDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/Service/LightKitAdminDebugTraceService.php#L91-L133)


See Also
================

The [LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/__construct.md)<br>Next method: [onRouteFound](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onRouteFound.md)<br>

