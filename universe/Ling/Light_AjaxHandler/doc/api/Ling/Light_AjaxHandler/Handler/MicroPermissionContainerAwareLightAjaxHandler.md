[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)



The MicroPermissionContainerAwareLightAjaxHandler class
================
2019-09-19 --> 2019-09-26






Introduction
============

The MicroPermissionContainerAwareLightAjaxHandler class.



Class synopsis
==============


abstract class <span class="pl-k">MicroPermissionContainerAwareLightAjaxHandler</span> extends [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - public [checkMicroPermission](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/MicroPermissionContainerAwareLightAjaxHandler/checkMicroPermission.md)(string $microPermission) : void

- Inherited methods
    - public [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md)() : void
    - public [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [ContainerAwareLightAjaxHandler::getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - abstract public [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md)(string $actionId, array $params) : array

}






Methods
==============

- [MicroPermissionContainerAwareLightAjaxHandler::checkMicroPermission](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/MicroPermissionContainerAwareLightAjaxHandler/checkMicroPermission.md) &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md) &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md) &ndash; Sets the light service container interface.
- [ContainerAwareLightAjaxHandler::getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md) &ndash; Returns the container instance.
- [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).





Location
=============
Ling\Light_AjaxHandler\Handler\MicroPermissionContainerAwareLightAjaxHandler<br>
See the source code of [Ling\Light_AjaxHandler\Handler\MicroPermissionContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/MicroPermissionContainerAwareLightAjaxHandler.php)



SeeAlso
==============
Previous class: [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)<br>Next class: [LightAjaxHandlerService](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService.md)<br>
