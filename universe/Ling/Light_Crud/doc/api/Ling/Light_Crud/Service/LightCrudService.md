[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)



The LightCrudService class
================
2019-11-28 --> 2020-03-10






Introduction
============

The LightCrudService class.



Class synopsis
==============


class <span class="pl-k">LightCrudService</span>  {

- Properties
    - protected [Ling\Light_Crud\CrudRequestHandler\LightCrudRequestHandlerInterface[]](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) [$handlers](#property-handlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/__construct.md)() : void
    - public [registerHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/registerHandler.md)(string $pluginIdentifier, [Ling\Light_Crud\CrudRequestHandler\LightCrudRequestHandlerInterface](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) $handler) : void
    - public [execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/execute.md)(string $contextIdentifier, string $table, string $action, ?array $params = []) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-handlers"><b>handlers</b></span>

    This property holds the handlers for this instance.
    An array of pluginIdentifier => LightCrudRequestHandlerInterface
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightCrudService::__construct](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/__construct.md) &ndash; Builds the LightCrudService instance.
- [LightCrudService::registerHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/registerHandler.md) &ndash; Registers a crud request handler.
- [LightCrudService::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/execute.md) &ndash; Executes the sql request and dispatches an event.
- [LightCrudService::setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Crud\Service\LightCrudService<br>
See the source code of [Ling\Light_Crud\Service\LightCrudService](https://github.com/lingtalfi/Light_Crud/blob/master/Service/LightCrudService.php)



SeeAlso
==============
Previous class: [LightCrudException](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Exception/LightCrudException.md)<br>
