[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)



The BaseLightAjaxHandler class
================
2019-09-19 --> 2019-11-28






Introduction
============

The BaseLightAjaxHandler class.
The main idea of this class is to ensure that every action is csrf protected.



Class synopsis
==============


abstract class <span class="pl-k">BaseLightAjaxHandler</span> extends [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - abstract protected [doHandle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/doHandle.md)(string $actionId, array $params) : mixed
    - public [handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/handle.md)(string $actionId, array $params) : array

- Inherited methods
    - public [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md)() : void
    - public [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [ContainerAwareLightAjaxHandler::getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [BaseLightAjaxHandler::doHandle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/doHandle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).
- [BaseLightAjaxHandler::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/handle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).
- [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md) &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md) &ndash; Sets the light service container interface.
- [ContainerAwareLightAjaxHandler::getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md) &ndash; Returns the container instance.





Location
=============
Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler<br>
See the source code of [Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/BaseLightAjaxHandler.php)



SeeAlso
==============
Previous class: [LightAjaxHandlerException](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Exception/LightAjaxHandlerException.md)<br>Next class: [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md)<br>
