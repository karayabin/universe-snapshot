[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightEvent class
================
2019-04-09 --> 2020-11-10






Introduction
============

The LightEvent class.

It stores data in the form of a variables array.



Class synopsis
==============


class <span class="pl-k">LightEvent</span>  {

- Properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;
    - protected [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) [$httpRequest](#property-httpRequest) ;
    - protected array [$vars](#property-vars) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/__construct.md)() : void
    - public static [createByContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/createByContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md)
    - public [setVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setVar.md)(string $key, $value) : self
    - public [getVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getVar.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed
    - public [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - public [getHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getHttpRequest.md)() : [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)
    - public [setHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setHttpRequest.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $httpRequest) : void
    - public [getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}




Properties
=============

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    

- <span id="property-httpRequest"><b>httpRequest</b></span>

    This property holds the httpRequest for this instance.
    
    

- <span id="property-vars"><b>vars</b></span>

    This property holds the vars for this instance.
    It's an array of key/value pairs.
    
    



Methods
==============

- [LightEvent::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/__construct.md) &ndash; Builds the LightEvent instance.
- [LightEvent::createByContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/createByContainer.md) &ndash; Returns a basic LightEvent instance with the light instance and the http request instance set.
- [LightEvent::setVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setVar.md) &ndash; Sets a variable.
- [LightEvent::getVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getVar.md) &ndash; Returns the variable value associated with the given variable key.
- [LightEvent::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getLight.md) &ndash; Returns the light of this instance.
- [LightEvent::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setLight.md) &ndash; Sets the light.
- [LightEvent::getHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getHttpRequest.md) &ndash; Returns the httpRequest of this instance.
- [LightEvent::setHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setHttpRequest.md) &ndash; Sets the httpRequest.
- [LightEvent::getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getContainer.md) &ndash; Returns the current service container instance.





Location
=============
Ling\Light\Events\LightEvent<br>
See the source code of [Ling\Light\Events\LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php)



SeeAlso
==============
Previous class: [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md)<br>Next class: [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)<br>
