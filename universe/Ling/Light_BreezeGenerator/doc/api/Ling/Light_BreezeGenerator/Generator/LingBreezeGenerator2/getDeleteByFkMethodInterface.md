[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2 class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)


LingBreezeGenerator2::getDeleteByFkMethodInterface
================



LingBreezeGenerator2::getDeleteByFkMethodInterface — Returns the content of the delete by fk template for the interface if there is a foreign key.




Description
================


protected [LingBreezeGenerator2::getDeleteByFkMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteByFkMethodInterface.md)(array $variables) : string




Returns the content of the delete by fk template for the interface if there is a foreign key.
We generate one method per foreign key column.

If the table doesn't have foreign key, it returns an empty string.




Parameters
================


- variables

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LingBreezeGenerator2::getDeleteByFkMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php#L2514-L2569)


See Also
================

The [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md) class.

Previous method: [getDeleteMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteMethodInterface.md)<br>Next method: [log](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/log.md)<br>

