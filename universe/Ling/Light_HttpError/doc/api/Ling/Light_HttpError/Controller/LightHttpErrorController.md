[Back to the Ling/Light_HttpError api](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError.md)



The LightHttpErrorController class
================
2020-10-30 --> 2020-10-30






Introduction
============

The LightHttpErrorController class.



Class synopsis
==============


abstract class <span class="pl-k">LightHttpErrorController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - abstract protected [doRender](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Controller/LightHttpErrorController/doRender.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [render](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Controller/LightHttpErrorController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

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

- [LightHttpErrorController::doRender](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Controller/LightHttpErrorController/doRender.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
- [LightHttpErrorController::render](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Controller/LightHttpErrorController/render.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_HttpError\Controller\LightHttpErrorController<br>
See the source code of [Ling\Light_HttpError\Controller\LightHttpErrorController](https://github.com/lingtalfi/Light_HttpError/blob/master/Controller/LightHttpErrorController.php)



SeeAlso
==============
Next class: [LightHttpErrorException](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException.md)<br>
