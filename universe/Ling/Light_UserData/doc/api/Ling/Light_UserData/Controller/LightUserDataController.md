[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataController class
================
2019-09-27 --> 2021-02-11






Introduction
============

The LightUserDataController class.



Class synopsis
==============


class <span class="pl-k">LightUserDataController</span> extends [LightSimpleHttpServerController](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController.md) implements [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - protected [doRender](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Controller/LightUserDataController/doRender.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightSimpleHttpServerController::render(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool

}






Methods
==============

- [LightUserDataController::doRender](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Controller/LightUserDataController/doRender.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
- LightSimpleHttpServerController::render &ndash; Renders the page requested by the given request, and returns the appropriate response.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_UserData\Controller\LightUserDataController<br>
See the source code of [Ling\Light_UserData\Controller\LightUserDataController](https://github.com/lingtalfi/Light_UserData/blob/master/Controller/LightUserDataController.php)



SeeAlso
==============
Previous class: [ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md)<br>Next class: [LightUserDataException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataException.md)<br>
