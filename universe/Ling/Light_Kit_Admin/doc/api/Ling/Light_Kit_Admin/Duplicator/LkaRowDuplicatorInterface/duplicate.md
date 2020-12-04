[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorInterface class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorInterface.md)


LkaRowDuplicatorInterface::duplicate
================



LkaRowDuplicatorInterface::duplicate — Duplicate the rows from the given table, which [extended rics](https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-extended-ric) are given.




Description
================


abstract public [LkaRowDuplicatorInterface::duplicate](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorInterface/duplicate.md)(string $table, array $rics, ?array $options = []) : void




Duplicate the rows from the given table, which [extended rics](https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-extended-ric) are given.

Available options are:

- deep: bool=false, whether to perform a deep duplication. By default, a simple duplication is performed.
- ...add your own options




Parameters
================


- table

    

- rics

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LkaRowDuplicatorInterface::duplicate](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaRowDuplicatorInterface.php#L27-L27)


See Also
================

The [LkaRowDuplicatorInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorInterface.md) class.



