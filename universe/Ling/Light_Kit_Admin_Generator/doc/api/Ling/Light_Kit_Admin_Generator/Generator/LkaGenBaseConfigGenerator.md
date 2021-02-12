[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The LkaGenBaseConfigGenerator class
================
2019-11-06 --> 2020-12-08






Introduction
============

The LkaGenBaseConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">LkaGenBaseConfigGenerator</span> extends [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;
    - protected callable [BaseConfigGenerator::$debugCallable](#property-debugCallable) ;

- Methods
    - protected [getRouteNameByTable](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator/getRouteNameByTable.md)(string $table, array $config, ?bool $isListRoute = true) : string

- Inherited methods
    - public BaseConfigGenerator::__construct() : void
    - public BaseConfigGenerator::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public BaseConfigGenerator::setDebugCallable(callable $debugCallable) : void
    - protected BaseConfigGenerator::debugLog(string $msg) : void
    - protected BaseConfigGenerator::getSymbolicPath(string $path) : string
    - protected BaseConfigGenerator::getTables() : array
    - protected BaseConfigGenerator::getKeyValue(string $keyPath, ?bool $throwEx = true, ?$default = null) : array | mixed | null
    - protected BaseConfigGenerator::setConfig(array $config) : void
    - protected BaseConfigGenerator::getGenericTagsByTable(string $table) : array
    - protected BaseConfigGenerator::getTableWithoutPrefix(string $table) : string
    - protected BaseConfigGenerator::isHasTable(string $table) : bool
    - protected BaseConfigGenerator::getTableInfo(string $table) : array
    - protected BaseConfigGenerator::getHumanTableName(string $table) : string

}






Methods
==============

- [LkaGenBaseConfigGenerator::getRouteNameByTable](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator/getRouteNameByTable.md) &ndash; Returns the route name based on the given table.
- BaseConfigGenerator::__construct &ndash; Builds the ListConfigGenerator instance.
- BaseConfigGenerator::setContainer &ndash; Sets the container.
- BaseConfigGenerator::setDebugCallable &ndash; Sets the debugCallable.
- BaseConfigGenerator::debugLog &ndash; Calls the debugCallable function if set.
- BaseConfigGenerator::getSymbolicPath &ndash; Returns the given absolute path, with the application directory replaced by a symbol if found.
- BaseConfigGenerator::getTables &ndash; Returns the tables to generate a config file for.
- BaseConfigGenerator::getKeyValue &ndash; Returns the value associated with the given keyPath.
- BaseConfigGenerator::setConfig &ndash; Sets the [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).
- BaseConfigGenerator::getGenericTagsByTable &ndash; Returns the array of generic tags (used in the list and form configuration files), based on the given table.
- BaseConfigGenerator::getTableWithoutPrefix &ndash; Returns the table name without prefix.
- BaseConfigGenerator::isHasTable &ndash; Returns whether the given table is a **has** table (aka a many to many table, such as user_has_permission for instance).
- BaseConfigGenerator::getTableInfo &ndash; Returns the tableInfo array, either from the createFile, or from the database, depending on the configuration.
- BaseConfigGenerator::getHumanTableName &ndash; Returns the human version of the given table name.





Location
=============
Ling\Light_Kit_Admin_Generator\Generator\LkaGenBaseConfigGenerator<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Generator\LkaGenBaseConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Generator/LkaGenBaseConfigGenerator.php)



SeeAlso
==============
Previous class: [LightKitAdminListConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LightKitAdminListConfigGenerator.md)<br>Next class: [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md)<br>
