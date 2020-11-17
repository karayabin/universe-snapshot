[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)<br>
[Back to the Ling\Light_DatabaseUtils\Util\RowDuplicator class](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md)


RowDuplicator::doDuplicate
================



RowDuplicator::doDuplicate — Duplicates the rows identified by the given rics, of the given table.




Description
================


protected [RowDuplicator::doDuplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/doDuplicate.md)(string $table, array $rics, ?array $options = []) : void




Duplicates the rows identified by the given rics, of the given table.

Available options are:

- deep: bool=false, whether to perform a deep duplicate
- forceValues: array. If set, will be merged with the data used to create the duplicated row.
- allowMany: bool=false. Whether to allow duplication of a table if it's a "many to many" relationship table. By default, it's not allowed.




Parameters
================


- table

    

- rics

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RowDuplicator::doDuplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/RowDuplicator.php#L91-L350)


See Also
================

The [RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md) class.

Previous method: [duplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/duplicate.md)<br>Next method: [onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/onInsertAfter.md)<br>

