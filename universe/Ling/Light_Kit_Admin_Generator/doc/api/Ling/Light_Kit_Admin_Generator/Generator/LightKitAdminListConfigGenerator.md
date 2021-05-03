[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The LightKitAdminListConfigGenerator class
================
2019-11-06 --> 2021-03-15






Introduction
============

The LightKitAdminListConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminListConfigGenerator</span> extends [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;
    - protected callable [BaseConfigGenerator::$debugCallable](#property-debugCallable) ;

- Methods
    - protected [getCrossColumnPluginName](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LightKitAdminListConfigGenerator/getCrossColumnPluginName.md)(string $pluginName, $rfTable, $crossColumnHubLinkTablePrefix2Plugin) : string

- Inherited methods
    - public ListConfigGenerator::generate(array $config) : void
    - protected ListConfigGenerator::getFileContent(string $table) : string
    - protected ListConfigGenerator::toOpenAdminDataTypes(array $types, string $table, ?array $options = []) : array
    - protected ListConfigGenerator::getOpenAdminDataTypeBySqlType(string $sqlType) : string
    - protected ListConfigGenerator::createColumnLabels(array $columns, string $table) : array
    - protected ListConfigGenerator::convertTypeAliases(array &$types, array $rowsRendererTypeAliases, string $table) : void
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

- [LightKitAdminListConfigGenerator::getCrossColumnPluginName](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LightKitAdminListConfigGenerator/getCrossColumnPluginName.md) &ndash; Returns the plugin to call for this cross column.
- ListConfigGenerator::generate &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).
- ListConfigGenerator::getFileContent &ndash; Returns the content of the config file for the given table.
- ListConfigGenerator::toOpenAdminDataTypes &ndash; with openAdminDataType being an [open admin data type](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md#the-data-types).
- ListConfigGenerator::getOpenAdminDataTypeBySqlType &ndash; Returns the openAdmin data type corresponding to the given sql type.
- ListConfigGenerator::createColumnLabels &ndash; Returns an array of columnName => label.
- ListConfigGenerator::convertTypeAliases &ndash; Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.
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
Ling\Light_Kit_Admin_Generator\Generator\LightKitAdminListConfigGenerator<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Generator\LightKitAdminListConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Generator/LightKitAdminListConfigGenerator.php)



SeeAlso
==============
Previous class: [ControllerGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator.md)<br>Next class: [LkaGenBaseConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator.md)<br>
