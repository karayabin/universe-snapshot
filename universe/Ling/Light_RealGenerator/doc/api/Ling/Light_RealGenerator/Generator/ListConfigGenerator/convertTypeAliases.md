[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\ListConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)


ListConfigGenerator::convertTypeAliases
================



ListConfigGenerator::convertTypeAliases — Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.




Description
================


protected [ListConfigGenerator::convertTypeAliases](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/convertTypeAliases.md)(array &$types, array $rowsRendererTypeAliases, string $table) : void




Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.
Also replace generic tags by their values.
See the [getGenericTagsByTable method](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getGenericTagsByTable.md) for more info.




Parameters
================


- types

    

- rowsRendererTypeAliases

    

- table

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ListConfigGenerator::convertTypeAliases](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/ListConfigGenerator.php#L711-L730)


See Also
================

The [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md) class.

Previous method: [createColumnLabels](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/createColumnLabels.md)<br>Next method: [findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findAlias.md)<br>

