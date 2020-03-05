[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The LightChloroformExtensionAjaxHandler class
================
2019-11-18 --> 2019-12-09






Introduction
============

The LightChloroformExtensionAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightChloroformExtensionAjaxHandler</span> extends [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler/handle.md)(string $actionId, array $params) : array

- Inherited methods
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightChloroformExtensionAjaxHandler::handle](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler/handle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_ChloroformExtension\AjaxHandler\LightChloroformExtensionAjaxHandler<br>
See the source code of [Ling\Light_ChloroformExtension\AjaxHandler\LightChloroformExtensionAjaxHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/AjaxHandler/LightChloroformExtensionAjaxHandler.php)



SeeAlso
==============
Next class: [LightChloroformExtensionException](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Exception/LightChloroformExtensionException.md)<br>
