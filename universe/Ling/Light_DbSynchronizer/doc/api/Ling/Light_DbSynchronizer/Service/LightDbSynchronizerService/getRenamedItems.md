[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::getRenamedItems
================



LightDbSynchronizerService::getRenamedItems — Returns the renamed items found in the given content.




Description
================


private [LightDbSynchronizerService::getRenamedItems](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getRenamedItems.md)(string $content) : array




Returns the renamed items found in the given content.

The returned array has the following structure:

- $renameType => $renamedItemsForType


The $renameType can be one of:
- table (a table has been renamed)
- column (a column has been renamed)

The $renamedItemsForType depends on the type.

For the table type, the $renamedItemsForType is an array of oldName => newName:
For the column type, the $renamedItemsForType is an array of tableName => oldName => newName:









See the [Light_DbSynchronizer conception notes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- content

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightDbSynchronizerService::getRenamedItems](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L1154-L1191)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [executeAlter](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeAlter.md)<br>

