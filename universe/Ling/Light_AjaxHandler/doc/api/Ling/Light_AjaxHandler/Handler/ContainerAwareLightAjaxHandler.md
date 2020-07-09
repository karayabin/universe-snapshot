[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)



The ContainerAwareLightAjaxHandler class
================
2019-09-19 --> 2020-07-06






Introduction
============

The ContainerAwareLightAjaxHandler class.



Class synopsis
==============


abstract class <span class="pl-k">ContainerAwareLightAjaxHandler</span> implements [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

- Inherited methods
    - abstract public [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md) &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md) &ndash; Sets the light service container interface.
- [ContainerAwareLightAjaxHandler::getContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/getContainer.md) &ndash; Returns the container instance.
- [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.





Location
=============
Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler<br>
See the source code of [Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/ContainerAwareLightAjaxHandler.php)



SeeAlso
==============
Previous class: [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md)<br>Next class: [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)<br>
