[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\BaseConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)


BaseConfigGenerator::getHumanTableName
================



BaseConfigGenerator::getHumanTableName — Returns the human version of the given table name.




Description
================


protected [BaseConfigGenerator::getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getHumanTableName.md)(string $table) : string




Returns the human version of the given table name.

This will remove the table prefix, if it's defined in the **table_prefixes** directive of the generator configuration file.




Parameters
================


- table

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [BaseConfigGenerator::getHumanTableName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/BaseConfigGenerator.php#L298-L311)


See Also
================

The [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md) class.

Previous method: [getTableInfo](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTableInfo.md)<br>

