[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\ListConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)


ListConfigGenerator::findRepresentativeColumnAlias
================



ListConfigGenerator::findRepresentativeColumnAlias — Returns a unique column alias, based on the given foreign key.




Description
================


private [ListConfigGenerator::findRepresentativeColumnAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findRepresentativeColumnAlias.md)(string $foreignKey) : string




Returns a unique column alias, based on the given foreign key.
It basically adds the "_plus" suffix to the given foreign key,
potentially followed by an auto-incremented number (to ensure uniqueness).




Parameters
================


- foreignKey

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [ListConfigGenerator::findRepresentativeColumnAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/ListConfigGenerator.php#L730-L745)


See Also
================

The [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md) class.

Previous method: [findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findAlias.md)<br>Next method: [getTableLabel](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getTableLabel.md)<br>

