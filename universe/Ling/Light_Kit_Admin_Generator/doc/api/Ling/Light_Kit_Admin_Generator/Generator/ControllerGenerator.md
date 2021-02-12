[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The ControllerGenerator class
================
2019-11-06 --> 2020-12-08






Introduction
============

The ControllerGenerator class.

The philosophy is that this tool is just a basic helper, it helps the developer getting 90% of the way,
but there is still work to do for the developer.

In other words, this tool doesn't try to fine tune every settings that the developer wish for, but rather
helps getting the developer in the ball park.

Note to myself: remember this philosophy when extending this class: don't overdo it...



Class synopsis
==============


class <span class="pl-k">ControllerGenerator</span> extends [LkaGenBaseConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;
    - protected callable [BaseConfigGenerator::$debugCallable](#property-debugCallable) ;

- Methods
    - public [generate](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator/generate.md)(array $config) : void
    - private [resolveTags](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator/resolveTags.md)(string $str, array $tags) : string

- Inherited methods
    - protected [LkaGenBaseConfigGenerator::getRouteNameByTable](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator/getRouteNameByTable.md)(string $table, array $config, ?bool $isListRoute = true) : string
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

- [ControllerGenerator::generate](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator/generate.md) &ndash; Generates the controller classes according to the given [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).
- [ControllerGenerator::resolveTags](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator/resolveTags.md) &ndash; Replace the tags by their values in the given string, and returns the result.
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
Ling\Light_Kit_Admin_Generator\Generator\ControllerGenerator<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Generator\ControllerGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Generator/ControllerGenerator.php)



SeeAlso
==============
Next class: [LightKitAdminListConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LightKitAdminListConfigGenerator.md)<br>
