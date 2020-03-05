[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md)


LingBreezeGenerator::getIdByUniqueIndexMethods
================



LingBreezeGenerator::getIdByUniqueIndexMethods — Parses the given variables, and returns an output.




Description
================


protected [LingBreezeGenerator::getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexMethods.md)(array $variables) : string




Parses the given variables, and returns an output.

The output depends on the whether the table has an auto-incremented key and some unique indexes:

- if the table has no auto-incremented key, the method returns an empty string
- if the table has an auto-incremented key, but has no unique indexes, the method also returns an empty string
- if the table has an auto-incremented key and some unique indexes, then the method generates a getter method for
     each unique index; this method returns the auto-incremented key from the given unique index column(s)




Parameters
================


- variables

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LingBreezeGenerator::getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator.php#L1026-L1067)


See Also
================

The [LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md) class.

Previous method: [getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicMethod.md)<br>Next method: [getItemsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsMethod.md)<br>

