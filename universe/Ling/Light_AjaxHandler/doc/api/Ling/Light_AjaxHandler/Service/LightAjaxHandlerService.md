[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)



The LightAjaxHandlerService class
================
2019-09-19 --> 2019-09-30






Introduction
============

The LightAjaxHandlerService class.



Class synopsis
==============


class <span class="pl-k">LightAjaxHandlerService</span>  {

- Properties
    - protected [Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface[]](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) [$handlers](#property-handlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [registerHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/registerHandler.md)(string $identifier, [Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) $handler) : void
    - public [getHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/getHandler.md)(string $identifier) : [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)

}




Properties
=============

- <span id="property-handlers"><b>handlers</b></span>

    This property holds the handlers for this instance.
    It's an array of handlerId => LightAjaxHandlerInterface.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightAjaxHandlerService::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/__construct.md) &ndash; Builds the LightAjaxHandlerService instance.
- [LightAjaxHandlerService::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/setContainer.md) &ndash; Sets the container.
- [LightAjaxHandlerService::registerHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/registerHandler.md) &ndash; Registers a handler.
- [LightAjaxHandlerService::getHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/getHandler.md) &ndash; Returns the handler identified by the given identifier.





Location
=============
Ling\Light_AjaxHandler\Service\LightAjaxHandlerService<br>
See the source code of [Ling\Light_AjaxHandler\Service\LightAjaxHandlerService](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Service/LightAjaxHandlerService.php)



SeeAlso
==============
Previous class: [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)<br>