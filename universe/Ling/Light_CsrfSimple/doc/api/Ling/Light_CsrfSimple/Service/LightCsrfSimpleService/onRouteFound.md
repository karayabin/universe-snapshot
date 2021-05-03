[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)<br>
[Back to the Ling\Light_CsrfSimple\Service\LightCsrfSimpleService class](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md)


LightCsrfSimpleService::onRouteFound
================



LightCsrfSimpleService::onRouteFound — This is a callable to execute when the **Ling.Light.on_route_found** event is fired.




Description
================


public [LightCsrfSimpleService::onRouteFound](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/onRouteFound.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void




This is a callable to execute when the **Ling.Light.on_route_found** event is fired.
See the [events page](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) for more details.

It calls the regenerate method if the page is a non-ajax page.




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
See the source code for method [LightCsrfSimpleService::onRouteFound](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Service/LightCsrfSimpleService.php#L54-L59)


See Also
================

The [LightCsrfSimpleService](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/__construct.md)<br>Next method: [getToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getToken.md)<br>

