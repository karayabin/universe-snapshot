[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)



The LightEventsService class
================
2019-10-31 --> 2020-01-08






Introduction
============

The LightEventsService class.



Class synopsis
==============


class <span class="pl-k">LightEventsService</span>  {

- Properties
    - protected array [$listeners](#property-listeners) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$dispatchedEvents](#property-dispatchedEvents) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md)() : void
    - public [dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md)(string $event, ?$data = null) : void
    - public [registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md)($eventName, $listener, ?int $priority = 0) : void
    - public [getDispatchedEvents](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/getDispatchedEvents.md)() : array
    - public [setContainer](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/onListenerProcessBefore.md)($listener, string $event, $data) : void

}




Properties
=============

- <span id="property-listeners"><b>listeners</b></span>

    This property holds the listeners for this instance.
    It's an array of priority => listenerGroup.
    Each listenerGroup is an array of listeners.
    
    Each listener is either:
    - a LightEventsListenerInterface instance
    - a callable, with signature:
         - f ( mixed data, string event ) // same as LightEventsListenerInterface->process
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dispatchedEvents"><b>dispatchedEvents</b></span>

    This property holds the dispatchedEvents for this instance.
    
    



Methods
==============

- [LightEventsService::__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md) &ndash; Builds the LightEventsService instance.
- [LightEventsService::dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md) &ndash; Dispatches the given event along with the given data.
- [LightEventsService::registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md) &ndash; Registers one or more listener(s) (either a callable or a LightEventsListenerInterface instance).
- [LightEventsService::getDispatchedEvents](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/getDispatchedEvents.md) &ndash; Returns the dispatchedEvents of this instance, in the order they appeared.
- [LightEventsService::setContainer](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setContainer.md) &ndash; Sets the container.
- [LightEventsService::onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/onListenerProcessBefore.md) &ndash; A hook called just before a listener is triggered.





Location
=============
Ling\Light_Events\Service\LightEventsService<br>
See the source code of [Ling\Light_Events\Service\LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/Service/LightEventsService.php)



SeeAlso
==============
Previous class: [DebugLightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/DebugLightEventsService.md)<br>
