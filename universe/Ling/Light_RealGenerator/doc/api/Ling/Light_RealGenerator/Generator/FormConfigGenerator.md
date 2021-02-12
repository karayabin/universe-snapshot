[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The FormConfigGenerator class
================
2019-10-24 --> 2020-12-08






Introduction
============

The FormConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">FormConfigGenerator</span> extends [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)  {

- Properties
    - private array [$tableListIdentifiers](#property-tableListIdentifiers) ;
    - private string [$tableListMode](#property-tableListMode) ;
    - private [Ling\Light_RealGenerator\Util\RepresentativeColumnFinderUtil](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil.md) [$representativeColumnFinder](#property-representativeColumnFinder) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;
    - protected callable [BaseConfigGenerator::$debugCallable](#property-debugCallable) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/__construct.md)() : void
    - public [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generate.md)(array $config) : void
    - protected [getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFileContent.md)(string $table) : string
    - protected [getFieldType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFieldType.md)(string $type) : string
    - protected [generateContentByTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generateContentByTables.md)(array $tables) : void
    - private [getTableListConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getTableListConf.md)(array $fkInfo) : array

- Inherited methods
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
    - protected [BaseConfigGenerator::getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getHumanTableName.md)(string $table) : string

}




Properties
=============

- <span id="property-tableListIdentifiers"><b>tableListIdentifiers</b></span>

    Array of table => item, with item an array containing:
    - tableListIdentifier: string, the table identifier
    - fkInfo: array containing reversed fk info (see code for more details):
         - 0: rfDb
         - 1: rfTable
         - 2: rfCol
    
    

- <span id="property-tableListMode"><b>tableListMode</b></span>

    This property holds the tableListMode for this instance.
    Defines how we'll generate the tableList type.
    
    
    Possible values are:
    - tableListIdentifier
    - tableListDirectiveId
    
    (more info in tableList conception notes)
    
    
    Default and recommended value is tableListDirectiveId, since all the configuration is gathered
    in the same place, whereas with tableListIdentifier, you've got configuration split
    into different files (not practical from the user's perspective).
    
    "tableListIdentifier" was the old mode.
    
    

- <span id="property-representativeColumnFinder"><b>representativeColumnFinder</b></span>

    This property holds the representativeColumnFinder for this instance.
    Just a cache.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-config"><b>config</b></span>

    This property holds the config for this instance.
    The [config block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
    
    

- <span id="property-debugCallable"><b>debugCallable</b></span>

    This function to call for debugging log messages.
    
    



Methods
==============

- [FormConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
- [FormConfigGenerator::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generate.md) &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
- [FormConfigGenerator::getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFileContent.md) &ndash; Returns the content of the config file for the given table.
- [FormConfigGenerator::getFieldType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFieldType.md) &ndash; Returns the field type for the given sql type.
- [FormConfigGenerator::generateContentByTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generateContentByTables.md) &ndash; Generate some content that applies to the whole table selection rather than on each individual tables.
- [FormConfigGenerator::getTableListConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getTableListConf.md) &ndash; Returns a configuration array based on the given fkInfo array.
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
- [BaseConfigGenerator::getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getHumanTableName.md) &ndash; Returns the human version of the given table name.





Location
=============
Ling\Light_RealGenerator\Generator\FormConfigGenerator<br>
See the source code of [Ling\Light_RealGenerator\Generator\FormConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/FormConfigGenerator.php)



SeeAlso
==============
Previous class: [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)<br>Next class: [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)<br>
