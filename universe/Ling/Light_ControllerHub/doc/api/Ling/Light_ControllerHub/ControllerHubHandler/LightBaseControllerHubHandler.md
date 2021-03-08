[Back to the Ling/Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md)



The LightBaseControllerHubHandler class
================
2019-10-28 --> 2021-03-05






Introduction
============

The LightBaseControllerHubHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightBaseControllerHubHandler</span> implements [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [doHandle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/doHandle.md)(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - abstract public [LightControllerHubHandlerInterface::handle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface/handle.md)(string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightBaseControllerHubHandler::__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/__construct.md) &ndash; Builds the LightKitAdminControllerHubHandler instance.
- [LightBaseControllerHubHandler::setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/setContainer.md) &ndash; Sets the light service container interface.
- [LightBaseControllerHubHandler::doHandle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/doHandle.md) &ndash; Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.
- [LightControllerHubHandlerInterface::handle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.





Location
=============
Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler<br>
See the source code of [Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/ControllerHubHandler/LightBaseControllerHubHandler.php)



SeeAlso
==============
Previous class: [LightControllerHubController](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Controller/LightControllerHubController.md)<br>Next class: [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md)<br>
