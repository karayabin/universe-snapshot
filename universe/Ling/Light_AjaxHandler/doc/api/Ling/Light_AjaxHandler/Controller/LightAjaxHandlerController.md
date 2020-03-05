[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)



The LightAjaxHandlerController class
================
2019-09-19 --> 2019-11-28






Introduction
============

The LightAjaxHandlerController class.



Class synopsis
==============


class <span class="pl-k">LightAjaxHandlerController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/handle.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [error](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/error.md)(string $message) : void

- Inherited methods
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface

}






Methods
==============

- [LightAjaxHandlerController::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/handle.md) &ndash; and returns its output as a HttpResponseInterface.
- [LightAjaxHandlerController::error](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/error.md) &ndash; Throws an exception with the given error message.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.





Location
=============
Ling\Light_AjaxHandler\Controller\LightAjaxHandlerController<br>
See the source code of [Ling\Light_AjaxHandler\Controller\LightAjaxHandlerController](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Controller/LightAjaxHandlerController.php)



SeeAlso
==============
Next class: [LightAjaxHandlerException](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Exception/LightAjaxHandlerException.md)<br>
