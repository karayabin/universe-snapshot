[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\ListConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)


ListConfigGenerator::findAlias
================



ListConfigGenerator::findAlias — Returns a unique alias corresponding to the given table.




Description
================


private [ListConfigGenerator::findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findAlias.md)(string $table) : string




Returns a unique alias corresponding to the given table.
The basic algorithm used is the following:

- remove the table prefix if any
- split by underscore, and take the first letter of each word.
         So for instance this table name: user_has_permission becomes uhp
         That's the natural alias
- add an auto-incremented to the natural alias found in the last step if necessary (to ensure uniqueness)




Parameters
================


- table

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ListConfigGenerator::findAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/ListConfigGenerator.php#L745-L770)


See Also
================

The [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md) class.

Previous method: [convertTypeAliases](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/convertTypeAliases.md)<br>Next method: [findRepresentativeColumnAlias](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/findRepresentativeColumnAlias.md)<br>

