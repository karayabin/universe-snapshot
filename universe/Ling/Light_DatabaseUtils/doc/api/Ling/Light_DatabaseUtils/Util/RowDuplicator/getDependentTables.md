[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)<br>
[Back to the Ling\Light_DatabaseUtils\Util\RowDuplicator class](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md)


RowDuplicator::getDependentTables
================



RowDuplicator::getDependentTables — Returns an array of dependent tables.




Description
================


private [RowDuplicator::getDependentTables](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/getDependentTables.md)(string $table, Ling\SimplePdoWrapper\Util\MysqlInfoUtil $util) : array




Returns an array of dependent tables.

A dependent table is a table that contains rows owned by the entity represented by the given main table.
The concept of owning is described in more details in [the deep duplication section of the duplicate rows conception notes](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/pages/duplicate-row.conception.md) document.




Parameters
================


- table

    

- util

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [RowDuplicator::getDependentTables](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/RowDuplicator.php#L379-L389)


See Also
================

The [RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md) class.

Previous method: [onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/onInsertAfter.md)<br>Next method: [error](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/error.md)<br>

