[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The LightChloroformExtensionService class
================
2019-11-18 --> 2019-12-09






Introduction
============

The LightChloroformExtensionService class.



Class synopsis
==============


class <span class="pl-k">LightChloroformExtensionService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface[]](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md) [$tableListConfigurationHandlers](#property-tableListConfigurationHandlers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md)() : void
    - public [registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md)(string $pluginName, [Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md) $handler) : void
    - public [getTableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListService.md)(string $tableListIdentifier) : [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)
    - public [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-tableListConfigurationHandlers"><b>tableListConfigurationHandlers</b></span>

    This property holds the configurationHandlers for this instance.
    It's an array of pluginName => TableListFieldConfigurationHandlerInterface.
    
    



Methods
==============

- [LightChloroformExtensionService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md) &ndash; Builds the LightChloroformExtensionService instance.
- [LightChloroformExtensionService::registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md) &ndash; Registers a table list configuration handler for the given plugin name.
- [LightChloroformExtensionService::getTableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListService.md) &ndash; Returns the table list service based on the given table list identifier.
- [LightChloroformExtensionService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService<br>
See the source code of [Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php)



SeeAlso
==============
Previous class: [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)<br>
