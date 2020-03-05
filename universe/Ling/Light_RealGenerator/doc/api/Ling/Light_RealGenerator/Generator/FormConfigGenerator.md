[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The FormConfigGenerator class
================
2019-10-24 --> 2020-03-03






Introduction
============

The FormConfigGenerator class.



Class synopsis
==============


class <span class="pl-k">FormConfigGenerator</span> extends [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseConfigGenerator::$container](#property-container) ;
    - protected array [BaseConfigGenerator::$config](#property-config) ;

- Methods
    - public [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generate.md)(array $config) : void
    - protected [getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFileContent.md)(string $table) : string
    - protected [getFieldType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFieldType.md)(string $type) : string
    - protected [generateContentByTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generateContentByTables.md)(array $tables) : void

- Inherited methods
    - public [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md)() : void
    - public [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [BaseConfigGenerator::getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md)() : array
    - protected [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md)(string $keyPath, ?bool $throwEx = true, ?$default = null) : array | mixed | null
    - protected [BaseConfigGenerator::setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md)(array $config) : void
    - protected [BaseConfigGenerator::getGenericTagsByTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md)(string $table) : array
    - protected [BaseConfigGenerator::getTableWithoutPrefix](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableWithoutPrefix.md)(string $table) : string
    - protected [BaseConfigGenerator::isHasTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/isHasTable.md)(string $table) : bool

}






Methods
==============

- [FormConfigGenerator::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generate.md) &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
- [FormConfigGenerator::getFileContent](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFileContent.md) &ndash; Returns the content of the config file for the given table.
- [FormConfigGenerator::getFieldType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/getFieldType.md) &ndash; Returns the field type for the given sql type.
- [FormConfigGenerator::generateContentByTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generateContentByTables.md) &ndash; Generate some content that applies to the whole table selection rather than on each individual tables.
- [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
- [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md) &ndash; Sets the container.
- [BaseConfigGenerator::getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md) &ndash; Returns the tables to generate a config file for.
- [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md) &ndash; Returns the value associated with the given keyPath.
- [BaseConfigGenerator::setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md) &ndash; Sets the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
- [BaseConfigGenerator::getGenericTagsByTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md) &ndash; Returns the array of generic tags (used in the list and form configuration files), based on the given table.
- [BaseConfigGenerator::getTableWithoutPrefix](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableWithoutPrefix.md) &ndash; Returns the table name without prefix.
- [BaseConfigGenerator::isHasTable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/isHasTable.md) &ndash; Returns whether the given table is a **has** table (aka a many to many table, such as user_has_permission for instance).





Location
=============
Ling\Light_RealGenerator\Generator\FormConfigGenerator<br>
See the source code of [Ling\Light_RealGenerator\Generator\FormConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/FormConfigGenerator.php)



SeeAlso
==============
Previous class: [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)<br>Next class: [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)<br>
