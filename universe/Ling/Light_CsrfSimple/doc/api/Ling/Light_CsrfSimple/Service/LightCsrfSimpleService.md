[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)



The LightCsrfSimpleService class
================
2019-11-07 --> 2019-12-09






Introduction
============

The LightCsrfSimpleService class.



Class synopsis
==============


class <span class="pl-k">LightCsrfSimpleService</span>  {

- Properties
    - private string [$sessionName](#property-sessionName) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/__construct.md)() : void
    - public [onRouteFound](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/onRouteFound.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [getToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getToken.md)() : string
    - public [getOldToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getOldToken.md)() : string
    - public [regenerate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/regenerate.md)() : void
    - public [isValid](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/isValid.md)(string $token, ?bool $useOldSlot = false) : bool
    - public [setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [startSession](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/startSession.md)() : void
    - private [rotate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/rotate.md)() : void

}




Properties
=============

- <span id="property-sessionName"><b>sessionName</b></span>

    This property holds the sessionName for this instance.
    You probably should never change it.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightCsrfSimpleService::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/__construct.md) &ndash; Builds the LightCsrfSimpleService instance.
- [LightCsrfSimpleService::onRouteFound](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/onRouteFound.md) &ndash; This is a callable to execute when the **Light.on_route_found** event is fired.
- [LightCsrfSimpleService::getToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getToken.md) &ndash; Returns the csrf token value stored in the new slot.
- [LightCsrfSimpleService::getOldToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getOldToken.md) &ndash; Returns the csrf token value stored in the old slot.
- [LightCsrfSimpleService::regenerate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/regenerate.md) &ndash; Regenerates a new token, and moves the replaced token to the old slot.
- [LightCsrfSimpleService::isValid](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/isValid.md) &ndash; Returns whether the given token is valid.
- [LightCsrfSimpleService::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/setContainer.md) &ndash; Sets the container.
- [LightCsrfSimpleService::startSession](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/startSession.md) &ndash; Ensures that the php session has started.
- [LightCsrfSimpleService::rotate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/rotate.md) &ndash; Regenerates a new token, and moves the replaced token to the old slot.





Location
=============
Ling\Light_CsrfSimple\Service\LightCsrfSimpleService<br>
See the source code of [Ling\Light_CsrfSimple\Service\LightCsrfSimpleService](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Service/LightCsrfSimpleService.php)



SeeAlso
==============
Previous class: [LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md)<br>
