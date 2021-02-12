[Back to the Ling/Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md)



The LightControllerHubService class
================
2019-10-28 --> 2020-12-08






Introduction
============

The LightControllerHubService class.



Class synopsis
==============


class <span class="pl-k">LightControllerHubService</span>  {

- Properties
    - protected [Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface[]](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) [$handlers](#property-handlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getControllerHubHandler.md)(string $pluginName) : [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md)
    - public [registerHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/registerHandler.md)(string $pluginName, [Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) $handler) : void
    - public [getRouteName](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getRouteName.md)() : string

}




Properties
=============

- <span id="property-handlers"><b>handlers</b></span>

    This property holds the handlers for this instance.
    It's an array of pluginName => LightControllerHubHandlerInterface
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightControllerHubService::__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/__construct.md) &ndash; Builds the LightControllerHubService instance.
- [LightControllerHubService::setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/setContainer.md) &ndash; Sets the container.
- [LightControllerHubService::getControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getControllerHubHandler.md) &ndash; Returns the controller hub handler registered by the plugin which name is given.
- [LightControllerHubService::registerHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/registerHandler.md) &ndash; Registers the handler for the plugin which name is given.
- [LightControllerHubService::getRouteName](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getRouteName.md) &ndash; Returns the route name of the hub controller.





Location
=============
Ling\Light_ControllerHub\Service\LightControllerHubService<br>
See the source code of [Ling\Light_ControllerHub\Service\LightControllerHubService](https://github.com/lingtalfi/Light_ControllerHub/blob/master/Service/LightControllerHubService.php)



SeeAlso
==============
Previous class: [LightControllerHubException](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Exception/LightControllerHubException.md)<br>
