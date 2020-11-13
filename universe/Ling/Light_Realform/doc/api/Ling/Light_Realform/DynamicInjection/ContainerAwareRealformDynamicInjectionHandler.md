[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The ContainerAwareRealformDynamicInjectionHandler class
================
2019-10-21 --> 2020-09-21






Introduction
============

The ContainerAwareRealformDynamicInjectionHandler class



Class synopsis
==============


abstract class <span class="pl-k">ContainerAwareRealformDynamicInjectionHandler</span> implements [RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/ContainerAwareRealformDynamicInjectionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/ContainerAwareRealformDynamicInjectionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - abstract public [RealformDynamicInjectionHandlerInterface::handle](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface/handle.md)(array $arguments) : mixed

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ContainerAwareRealformDynamicInjectionHandler::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/ContainerAwareRealformDynamicInjectionHandler/__construct.md) &ndash; Builds the ContainerAwareRealformDynamicInjectionHandler instance.
- [ContainerAwareRealformDynamicInjectionHandler::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/ContainerAwareRealformDynamicInjectionHandler/setContainer.md) &ndash; Sets the light service container interface.
- [RealformDynamicInjectionHandlerInterface::handle](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface/handle.md) &ndash; Returns a result depending on the given arguments.





Location
=============
Ling\Light_Realform\DynamicInjection\ContainerAwareRealformDynamicInjectionHandler<br>
See the source code of [Ling\Light_Realform\DynamicInjection\ContainerAwareRealformDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/DynamicInjection/ContainerAwareRealformDynamicInjectionHandler.php)



SeeAlso
==============
Next class: [LightRealformDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/LightRealformDynamicInjectionHandler.md)<br>
