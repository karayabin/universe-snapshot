[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The TableListService class
================
2019-11-18 --> 2019-12-09






Introduction
============

The TableListService.



Class synopsis
==============


class <span class="pl-k">TableListService</span>  {

- Properties
    - protected [Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md) [$configurationHandler](#property-configurationHandler) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$pluginId](#property-pluginId) ;
    - private array [$_cache](#property-_cache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md)() : void
    - public [getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md)() : int
    - public [getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)(?string $userQuery = , ?bool $valueAsIndex = true) : array
    - public [getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getLabel.md)(string $columnValue) : string
    - public [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setConfigurationHandler.md)([Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md) $configurationHandler) : void
    - public [setPluginId](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setPluginId.md)(string $pluginId) : void
    - public [getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getConfigurationItem.md)(?string $pluginId = null) : array
    - protected [getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getTableListSqlQueryInfo.md)(?bool $isCount = true, ?array $options = []) : array

}




Properties
=============

- <span id="property-configurationHandler"><b>configurationHandler</b></span>

    This property holds the configurationHandler for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-pluginId"><b>pluginId</b></span>

    This property holds the pluginId for this instance.
    
    

- <span id="property-_cache"><b>_cache</b></span>

    This property holds the _cache for this instance.
    An array of pluginId => configuration item.
    
    



Methods
==============

- [TableListService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md) &ndash; Builds the TableListService instance.
- [TableListService::getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated with the defined pluginId.
- [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md) &ndash; Returns an array of rows based on the defined pluginId.
- [TableListService::getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getLabel.md) &ndash; Returns the formatted label of the column, based on the given raw value.
- [TableListService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md) &ndash; Sets the container.
- [TableListService::setConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setConfigurationHandler.md) &ndash; Sets the configurationHandler.
- [TableListService::setPluginId](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setPluginId.md) &ndash; Sets the pluginId.
- [TableListService::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getConfigurationItem.md) &ndash; Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) referenced by the given pluginId.
- [TableListService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getTableListSqlQueryInfo.md) &ndash; Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.





Location
=============
Ling\Light_ChloroformExtension\Field\TableList\TableListService<br>
See the source code of [Ling\Light_ChloroformExtension\Field\TableList\TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php)



SeeAlso
==============
Previous class: [TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md)<br>Next class: [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)<br>
