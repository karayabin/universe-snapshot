[Back to the Ling/Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md)



The JimToolboxController class
================
2021-07-08 --> 2021-07-27






Introduction
============

The LkaJimToolboxController class.



Class synopsis
==============


class <span class="pl-k">JimToolboxController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [render](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Controller/JimToolboxController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

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

- [JimToolboxController::render](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Controller/JimToolboxController/render.md) &ndash; Renders an [acp response](https://github.com/lingtalfi/AjaxCommunicationProtocol#the-ajax-communication-protocol) containing the pane body and title information.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_JimToolbox\Controller\JimToolboxController<br>
See the source code of [Ling\Light_JimToolbox\Controller\JimToolboxController](https://github.com/lingtalfi/Light_JimToolbox/blob/master/Controller/JimToolboxController.php)



SeeAlso
==============
Next class: [LightJimToolboxException](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Exception/LightJimToolboxException.md)<br>
