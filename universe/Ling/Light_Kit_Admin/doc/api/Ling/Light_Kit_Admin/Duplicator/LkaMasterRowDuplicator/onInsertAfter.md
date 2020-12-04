[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Duplicator\LkaMasterRowDuplicator class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator.md)


LkaMasterRowDuplicator::onInsertAfter
================



LkaMasterRowDuplicator::onInsertAfter — Hook method called whenever a new row is inserted in the database via the duplicate method.




Description
================


protected [LkaMasterRowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void




Hook method called whenever a new row is inserted in the database via the duplicate method.




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
See the source code for method [LkaMasterRowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaMasterRowDuplicator.php#L83-L88)


See Also
================

The [LkaMasterRowDuplicator](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator.md) class.

Previous method: [duplicateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/duplicateRows.md)<br>

