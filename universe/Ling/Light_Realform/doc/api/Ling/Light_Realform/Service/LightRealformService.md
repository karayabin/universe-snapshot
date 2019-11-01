[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The LightRealformService class
================
2019-10-21 --> 2019-11-01






Introduction
============

The LightRealformService class.



Class synopsis
==============


class <span class="pl-k">LightRealformService</span>  {

- Properties
    - protected [Ling\Light_Realform\Handler\RealformHandlerInterface[]](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md) [$handlers](#property-handlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_Realform\DynamicInjection\RealformDynamicInjectionHandlerInterface[]](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md) [$dynamicInjectionHandlers](#property-dynamicInjectionHandlers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/__construct.md)() : void
    - public [getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFormHandler.md)(string $identifier) : [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md)
    - public [registerFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerFormHandler.md)(string $pluginName, [Ling\Light_Realform\Handler\RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md) $formHandler) : void
    - public [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md)(string $identifier, [Ling\Light_Realform\DynamicInjection\RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md) $handler) : void
    - public [getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getDynamicInjectionHandler.md)(string $identifier) : [RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setHandlers](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setHandlers.md)(array $handlers) : void

}




Properties
=============

- <span id="property-handlers"><b>handlers</b></span>

    This property holds the handlers for this instance.
    It's an array of pluginName => RealformHandlerInterface
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dynamicInjectionHandlers"><b>dynamicInjectionHandlers</b></span>

    This property holds the dynamicInjectionHandlers for this instance.
    It's an array of identifier => RealformDynamicInjectionHandlerInterface
    
    Usually the identifier is a plugin name.
    
    



Methods
==============

- [LightRealformService::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/__construct.md) &ndash; Builds the LightRealformService instance.
- [LightRealformService::getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFormHandler.md) &ndash; Returns the realform handler instance corresponding to the given identifier.
- [LightRealformService::registerFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerFormHandler.md) &ndash; Registers a realform handler.
- [LightRealformService::registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md) &ndash; Registers a [dynamic injection handler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes-linear.md#dynamic-injection).
- [LightRealformService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getDynamicInjectionHandler.md) &ndash; or throws an exception if it's not there.
- [LightRealformService::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md) &ndash; Sets the container.
- [LightRealformService::setHandlers](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setHandlers.md) &ndash; Sets the handlers.





Location
=============
Ling\Light_Realform\Service\LightRealformService<br>
See the source code of [Ling\Light_Realform\Service\LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php)



SeeAlso
==============
Previous class: [LightRealformHandlerAliasHelperService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService.md)<br>Next class: [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)<br>
