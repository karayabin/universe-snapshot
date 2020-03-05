[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md)


LingBreezeGenerator::getIdByUniqueIndexInterfaceMethods
================



LingBreezeGenerator::getIdByUniqueIndexInterfaceMethods — Parses the given variables, and returns an output.




Description
================


protected [LingBreezeGenerator::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexInterfaceMethods.md)(array $variables) : string




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
See the source code for method [LingBreezeGenerator::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator.php#L1471-L1513)


See Also
================

The [LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md) class.

Previous method: [getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsXXXByHasInterfaceMethod.md)<br>Next method: [getInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInterfaceMethod.md)<br>

