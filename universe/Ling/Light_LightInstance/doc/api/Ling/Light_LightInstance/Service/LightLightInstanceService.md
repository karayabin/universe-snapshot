[Back to the Ling/Light_LightInstance api](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance.md)



The LightLightInstanceService class
================
2019-10-09 --> 2021-03-05






Introduction
============

The LightLightInstanceService class.



Class synopsis
==============


class <span class="pl-k">LightLightInstanceService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;
    - protected [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) [$httpRequest](#property-httpRequest) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getLight](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - public [getHttpRequest](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/getHttpRequest.md)() : [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    

- <span id="property-httpRequest"><b>httpRequest</b></span>

    This property holds the httpRequest for this instance.
    
    



Methods
==============

- [LightLightInstanceService::__construct](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/__construct.md) &ndash; Builds the LightLightInstanceService instance.
- [LightLightInstanceService::initialize](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/initialize.md) &ndash; Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightLightInstanceService::getLight](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/getLight.md) &ndash; Returns the current light instance.
- [LightLightInstanceService::getHttpRequest](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/getHttpRequest.md) &ndash; Returns the current http request instance.
- [LightLightInstanceService::setContainer](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance/Service/LightLightInstanceService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_LightInstance\Service\LightLightInstanceService<br>
See the source code of [Ling\Light_LightInstance\Service\LightLightInstanceService](https://github.com/lingtalfi/Light_LightInstance/blob/master/Service/LightLightInstanceService.php)



