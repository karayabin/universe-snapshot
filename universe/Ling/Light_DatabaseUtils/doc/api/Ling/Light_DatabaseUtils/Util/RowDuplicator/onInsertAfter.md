[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)<br>
[Back to the Ling\Light_DatabaseUtils\Util\RowDuplicator class](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md)


RowDuplicator::onInsertAfter
================



RowDuplicator::onInsertAfter — Hook method called whenever a new row is inserted in the database via the duplicate method.




Description
================


protected [RowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/onInsertAfter.md)(string $table, array $newRow, ?$lastInsertId = null) : void




Hook method called whenever a new row is inserted in the database via the duplicate method.




Parameters
================


- table

    

- newRow

    

- lastInsertId

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [RowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/RowDuplicator.php#L361-L364)


See Also
================

The [RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md) class.

Previous method: [doDuplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/doDuplicate.md)<br>Next method: [getDependentTables](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/getDependentTables.md)<br>

