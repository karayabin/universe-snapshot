[Back to the Ling/Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md)<br>
[Back to the Ling\Light_EasyRoute\Service\LightEasyRouteService class](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService.md)


LightEasyRouteService::initialize
================



LightEasyRouteService::initialize — Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightEasyRouteService::initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
It will register all the routes from the files registered by other plugins.




Parameters
================


- event

    


Return values
================

Returns void.


Exceptions thrown
================

- [LightEasyRouteException](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Exception/LightEasyRouteException.md).&nbsp;







Source Code
===========
See the source code for method [LightEasyRouteService::initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/Service/LightEasyRouteService.php#L45-L66)


See Also
================

The [LightEasyRouteService](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md)<br>Next method: [registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md)<br>

