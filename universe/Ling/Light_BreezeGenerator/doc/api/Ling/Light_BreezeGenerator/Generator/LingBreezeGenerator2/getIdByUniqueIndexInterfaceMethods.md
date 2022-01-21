[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2 class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)


LingBreezeGenerator2::getIdByUniqueIndexInterfaceMethods
================



LingBreezeGenerator2::getIdByUniqueIndexInterfaceMethods — Parses the given variables, and returns an output.




Description
================


protected [LingBreezeGenerator2::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexInterfaceMethods.md)(array $variables) : string




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
See the source code for method [LingBreezeGenerator2::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php#L2100-L2151)


See Also
================

The [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md) class.

Previous method: [getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsXXXByHasInterfaceMethod.md)<br>Next method: [getMultipleInsertXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getMultipleInsertXXXInterfaceMethod.md)<br>

