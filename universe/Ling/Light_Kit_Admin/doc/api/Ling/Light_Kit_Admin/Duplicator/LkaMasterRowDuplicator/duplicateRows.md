[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Duplicator\LkaMasterRowDuplicator class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator.md)


LkaMasterRowDuplicator::duplicateRows
================



LkaMasterRowDuplicator::duplicateRows — Duplicates the rows identified by the given rics, for the given plugin and table.




Description
================


public [LkaMasterRowDuplicator::duplicateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/duplicateRows.md)(string $planetId, string $table, array $rics, ?array $options = []) : void




Duplicates the rows identified by the given rics, for the given plugin and table.

Available options are:
- deep: bool=false, whether to perform a deep duplicate.
     Note: if you override our default behaviour, this option might not be interpreted (i.e. it's up to the overriding class to interpret it).



You can either override the duplicator entirely, or hook into our default duplicator, using conventions based on the
planetId.

For more details, see the [Light_Kit_Admin duplicate row conception notes](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/realist-duplicate-row.conception).




Parameters
================


- planetId

    

- table

    

- rics

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LkaMasterRowDuplicator::duplicateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaMasterRowDuplicator.php#L52-L74)


See Also
================

The [LkaMasterRowDuplicator](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/__construct.md)<br>Next method: [onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/onInsertAfter.md)<br>

