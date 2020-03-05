[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)



The DebugLightEventsService class
================
2019-10-31 --> 2020-01-08






Introduction
============

The DebugLightEventsService class.



Class synopsis
==============


class <span class="pl-k">DebugLightEventsService</span> extends [LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService.md)  {

- Inherited properties
    - protected array [LightEventsService::$listeners](#property-listeners) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightEventsService::$container](#property-container) ;
    - protected array [LightEventsService::$dispatchedEvents](#property-dispatchedEvents) ;

- Methods
    - protected [onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/DebugLightEventsService/onListenerProcessBefore.md)($listener, string $event, $data) : void

- Inherited methods
    - public [LightEventsService::__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md)() : void
    - public [LightEventsService::dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md)(string $event, ?$data = null) : void
    - public [LightEventsService::registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md)($eventName, $listener, ?int $priority = 0) : void
    - public [LightEventsService::getDispatchedEvents](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/getDispatchedEvents.md)() : array
    - public [LightEventsService::setContainer](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [DebugLightEventsService::onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/DebugLightEventsService/onListenerProcessBefore.md) &ndash; A hook called just before a listener is triggered.
- [LightEventsService::__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md) &ndash; Builds the LightEventsService instance.
- [LightEventsService::dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md) &ndash; Dispatches the given event along with the given data.
- [LightEventsService::registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md) &ndash; Registers one or more listener(s) (either a callable or a LightEventsListenerInterface instance).
- [LightEventsService::getDispatchedEvents](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/getDispatchedEvents.md) &ndash; Returns the dispatchedEvents of this instance, in the order they appeared.
- [LightEventsService::setContainer](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Events\Service\DebugLightEventsService<br>
See the source code of [Ling\Light_Events\Service\DebugLightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/Service/DebugLightEventsService.php)



SeeAlso
==============
Previous class: [LightEventsListenerInterface](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md)<br>Next class: [LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService.md)<br>
