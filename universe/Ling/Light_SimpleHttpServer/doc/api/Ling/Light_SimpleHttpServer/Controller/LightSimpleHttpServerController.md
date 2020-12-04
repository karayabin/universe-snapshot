[Back to the Ling/Light_SimpleHttpServer api](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer.md)



The LightSimpleHttpServerController class
================
2020-10-30 --> 2020-11-20






Introduction
============

The LightSimpleHttpServerController class.



Class synopsis
==============


abstract class <span class="pl-k">LightSimpleHttpServerController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - abstract protected [doRender](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController/doRender.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [render](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool

}






Methods
==============

- [LightSimpleHttpServerController::doRender](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController/doRender.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
- [LightSimpleHttpServerController::render](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController/render.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_SimpleHttpServer\Controller\LightSimpleHttpServerController<br>
See the source code of [Ling\Light_SimpleHttpServer\Controller\LightSimpleHttpServerController](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/Controller/LightSimpleHttpServerController.php)



SeeAlso
==============
Next class: [LightSimpleHttpServerException](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException.md)<br>
