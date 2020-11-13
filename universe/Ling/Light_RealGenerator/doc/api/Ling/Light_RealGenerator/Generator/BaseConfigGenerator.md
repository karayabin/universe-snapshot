[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The BaseConfigGenerator class
================
2019-10-24 --> 2020-11-12






Introduction
============

The BaseConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">BaseConfigGenerator</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$config](#property-config) ;
    - protected callable [$debugCallable](#property-debugCallable) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md)(callable $debugCallable) : void
    - protected [debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/debugLog.md)(string $msg) : void
    - protected [getSymbolicPath](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getSymbolicPath.md)(string $path) : string
    - protected [getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md)() : array
    - protected [getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md)(string $keyPath, ?bool $throwEx = true, ?$default = null) : array | mixed | null
    - protected [setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md)(array $config) : void
    - protected [getGenericTagsByTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md)(string $table) : array
    - protected [getTableWithoutPrefix](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableWithoutPrefix.md)(string $table) : string
    - protected [isHasTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/isHasTable.md)(string $table) : bool
    - protected [getTableInfo](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableInfo.md)(string $table) : array
    - protected [getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getHumanTableName.md)(string $table) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-config"><b>config</b></span>

    This property holds the config for this instance.
    The [config block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
    
    

- <span id="property-debugCallable"><b>debugCallable</b></span>

    This function to call for debugging log messages.
    
    



Methods
==============

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
- [BaseConfigGenerator::getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getHumanTableName.md) &ndash; Returns the human version of the given table name.





Location
=============
Ling\Light_RealGenerator\Generator\BaseConfigGenerator<br>
See the source code of [Ling\Light_RealGenerator\Generator\BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/BaseConfigGenerator.php)



SeeAlso
==============
Previous class: [LightRealGeneratorException](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Exception/LightRealGeneratorException.md)<br>Next class: [FormConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator.md)<br>
