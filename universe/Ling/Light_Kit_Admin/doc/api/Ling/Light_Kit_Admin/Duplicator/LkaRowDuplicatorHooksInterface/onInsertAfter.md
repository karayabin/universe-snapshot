[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface.md)


LkaRowDuplicatorHooksInterface::onInsertAfter
================



LkaRowDuplicatorHooksInterface::onInsertAfter — Is executed after a row is duplicated.




Description
================


abstract public [LkaRowDuplicatorHooksInterface::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void




Is executed after a row is duplicated.
It's a hook for devs.




Parameters
================


- mainTable

    

- table

    

- oldRow

    

- newRow

    

- lastInsertId

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LkaRowDuplicatorHooksInterface::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaRowDuplicatorHooksInterface.php#L24-L24)


See Also
================

The [LkaRowDuplicatorHooksInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface.md) class.



