[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The ContainerAwareRealistDynamicInjectionHandler class
================
2019-08-12 --> 2020-12-08






Introduction
============

The ContainerAwareRealistDynamicInjectionHandler class



Class synopsis
==============


abstract class <span class="pl-k">ContainerAwareRealistDynamicInjectionHandler</span> implements [RealistDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - abstract public [RealistDynamicInjectionHandlerInterface::handle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface/handle.md)(array $arguments) : mixed

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ContainerAwareRealistDynamicInjectionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler/__construct.md) &ndash; Builds the ContainerAwareRealistDynamicInjectionHandler instance.
- [ContainerAwareRealistDynamicInjectionHandler::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler/setContainer.md) &ndash; Sets the light service container interface.
- [RealistDynamicInjectionHandlerInterface::handle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface/handle.md) &ndash; Returns a result depending on the given arguments.





Location
=============
Ling\Light_Realist\DynamicInjection\ContainerAwareRealistDynamicInjectionHandler<br>
See the source code of [Ling\Light_Realist\DynamicInjection\ContainerAwareRealistDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler.php)



SeeAlso
==============
Previous class: [DeveloperVariableProviderInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DeveloperVariableProvider/DeveloperVariableProviderInterface.md)<br>Next class: [LightRealistDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/LightRealistDynamicInjectionHandler.md)<br>
