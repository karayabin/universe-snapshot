[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightController class
================
2019-04-09 --> 2021-02-11






Introduction
============

The LightController class.

Note: a LightController provides two methods to access the Light application
and the service container (getLight, and getContainer),
which is an alternative to passing those objects as arguments of the controller method.



Class synopsis
==============


class <span class="pl-k">LightController</span> implements [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md) {

- Properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/__construct.md)() : void
    - public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected [getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected [getHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getHttpRequest.md)() : [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)
    - protected [hasService](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/hasService.md)(string $serviceName) : bool

}




Properties
=============

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [LightController::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/__construct.md) &ndash; Builds the LightController instance.
- [LightController::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/setLight.md) &ndash; Sets the light instance.
- [LightController::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getLight.md) &ndash; Returns the light application.
- [LightController::getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getContainer.md) &ndash; Returns the service container.
- [LightController::getHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/getHttpRequest.md) &ndash; Returns the http request bound to the light instance.
- [LightController::hasService](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController/hasService.md) &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light\Controller\LightController<br>
See the source code of [Ling\Light\Controller\LightController](https://github.com/lingtalfi/Light/blob/master/Controller/LightController.php)



SeeAlso
==============
Next class: [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md)<br>
