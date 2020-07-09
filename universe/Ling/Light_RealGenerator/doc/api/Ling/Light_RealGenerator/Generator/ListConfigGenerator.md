[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The ListConfigGenerator class
================
2019-10-24 --> 2020-07-07






Introduction
============

The ListConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">ListConfigGenerator</span> extends [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)  {

- Properties
    - private array [$_aliases](#property-_aliases) ;
    - private array [$_colAliases](#property-_colAliases) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;
    - protected callable [BaseConfigGenerator::$debugCallable](#property-debugCallable) ;

- Methods
    - public [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/generate.md)(array $config) : void
    - protected [getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getFileContent.md)(string $table) : string
    - protected [toOpenAdminDataTypes](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/toOpenAdminDataTypes.md)(array $types, string $table, ?array $options = []) : array
    - protected [getOpenAdminDataTypeBySqlType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getOpenAdminDataTypeBySqlType.md)(string $sqlType) : string
    - protected [createColumnLabels](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/createColumnLabels.md)(array $columns, string $table) : array
    - protected [convertTypeAliases](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/convertTypeAliases.md)(array &$types, array $rowsRendererTypeAliases, string $table) : void
    - private [findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findAlias.md)(string $table) : string
    - private [findRepresentativeColumnAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findRepresentativeColumnAlias.md)(string $foreignKey) : string
    - private [getTableLabel](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getTableLabel.md)(string $table) : string

- Inherited methods
    - public [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md)() : void
    - public [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [BaseConfigGenerator::setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md)(callable $debugCallable) : void
    - protected [BaseConfigGenerator::debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/debugLog.md)(string $msg) : void
    - protected [BaseConfigGenerator::getSymbolicPath](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getSymbolicPath.md)(string $path) : string
    - protected [BaseConfigGenerator::getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md)() : array
    - protected [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md)(string $keyPath, ?bool $throwEx = true, ?$default = null) : array | mixed | null
    - protected [BaseConfigGenerator::setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md)(array $config) : void
    - protected [BaseConfigGenerator::getGenericTagsByTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md)(string $table) : array
    - protected [BaseConfigGenerator::getTableWithoutPrefix](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableWithoutPrefix.md)(string $table) : string
    - protected [BaseConfigGenerator::isHasTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/isHasTable.md)(string $table) : bool
    - protected [BaseConfigGenerator::getTableInfo](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableInfo.md)(string $table) : array

}




Properties
=============

- <span id="property-_aliases"><b>_aliases</b></span>

    This property holds the table aliases used inside the context of the getFileContent method.
    
    

- <span id="property-_colAliases"><b>_colAliases</b></span>

    This property holds the column aliases used inside the context of the getFileContent method.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-config"><b>config</b></span>

    This property holds the config for this instance.
    The [config block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
    
    

- <span id="property-debugCallable"><b>debugCallable</b></span>

    This function to call for debugging log messages.
    
    



Methods
==============

- [ListConfigGenerator::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/generate.md) &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
- [ListConfigGenerator::getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getFileContent.md) &ndash; Returns the content of the config file for the given table.
- [ListConfigGenerator::toOpenAdminDataTypes](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/toOpenAdminDataTypes.md) &ndash; with openAdminDataType being an [open admin data type](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md#the-data-types).
- [ListConfigGenerator::getOpenAdminDataTypeBySqlType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getOpenAdminDataTypeBySqlType.md) &ndash; Returns the openAdmin data type corresponding to the given sql type.
- [ListConfigGenerator::createColumnLabels](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/createColumnLabels.md) &ndash; Returns an array of columnName => label.
- [ListConfigGenerator::convertTypeAliases](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/convertTypeAliases.md) &ndash; Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.
- [ListConfigGenerator::findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findAlias.md) &ndash; Returns a unique alias corresponding to the given table.
- [ListConfigGenerator::findRepresentativeColumnAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findRepresentativeColumnAlias.md) &ndash; Returns a unique column alias, based on the given foreign key.
- [ListConfigGenerator::getTableLabel](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getTableLabel.md) &ndash; Returns a default label associated with the given table name.
- [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
- [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md) &ndash; Sets the container.
- [BaseConfigGenerator::setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md) &ndash; Sets the debugCallable.
- [BaseConfigGenerator::debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/debugLog.md) &ndash; Calls the debugCallable function if set.
- [BaseConfigGenerator::getSymbolicPath](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getSymbolicPath.md) &ndash; Returns the given absolute path, with the application directory replaced by a symbol if found.
- [BaseConfigGenerator::getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md) &ndash; Returns the tables to generate a config file for.
- [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md) &ndash; Returns the value associated with the given keyPath.
- [BaseConfigGenerator::setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md) &ndash; Sets the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
- [BaseConfigGenerator::getGenericTagsByTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md) &ndash; Returns the array of generic tags (used in the list and form configuration files), based on the given table.
- [BaseConfigGenerator::getTableWithoutPrefix](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableWithoutPrefix.md) &ndash; Returns the table name without prefix.
- [BaseConfigGenerator::isHasTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/isHasTable.md) &ndash; Returns whether the given table is a **has** table (aka a many to many table, such as user_has_permission for instance).
- [BaseConfigGenerator::getTableInfo](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableInfo.md) &ndash; Returns the tableInfo array, either from the createFile, or from the database, depending on the configuration.





Location
=============
Ling\Light_RealGenerator\Generator\ListConfigGenerator<br>
See the source code of [Ling\Light_RealGenerator\Generator\ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/ListConfigGenerator.php)



SeeAlso
==============
Previous class: [FormConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator.md)<br>Next class: [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md)<br>
