[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)



The LightEventsService class
================
2019-10-31 --> 2019-10-31






Introduction
============

The LightEventsService class.



Class synopsis
==============


class <span class="pl-k">LightEventsService</span>  {

- Properties
    - protected array [$listeners](#property-listeners) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md)() : void
    - public [dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md)(string $event, ?$data = null) : void
    - public [registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md)(string $event, $listener) : void

}




Properties
=============

- <span id="property-listeners"><b>listeners</b></span>

    This property holds the listeners for this instance.
    Each listener is either:
    - a LightEventsListenerInterface instance
    - a callable, with signature:
         - f ( mixed data, string event ) // same as LightEventsListenerInterface->process
    
    



Methods
==============

- [LightEventsService::__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md) &ndash; Builds the LightEventsService instance.
- [LightEventsService::dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md) &ndash; Dispatches the given event along with the given data.
- [LightEventsService::registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md) &ndash; Registers a listener (either a callable or a LightEventsListenerInterface instance).





Location
=============
Ling\Light_Events\Service\LightEventsService<br>
See the source code of [Ling\Light_Events\Service\LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/Service/LightEventsService.php)



SeeAlso
==============
Previous class: [LightEventsListenerInterface](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md)<br>
