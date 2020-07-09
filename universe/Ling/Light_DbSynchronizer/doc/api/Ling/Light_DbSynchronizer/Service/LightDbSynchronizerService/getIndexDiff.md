[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::getIndexDiff
================



LightDbSynchronizerService::getIndexDiff — Returns the diff array for the given indexes.




Description
================


private [LightDbSynchronizerService::getIndexDiff](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getIndexDiff.md)(array $uids, array $fileUids) : array




Returns the diff array for the given indexes.

The returned array has the following entries:

- 0: indexes to add. It's an array of indexName => indexCols
- 1: indexes to remove. It's an array of index names.
- 2: indexes to modify. It's an array of indexName => indexCols

The $uids parameter is the array resulting from the call to the [mysqlInfoUtil->getUniqueIndexesDetails method](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md).
The $fileUids parameter is the "indexes" property of the array resulting from the call to the readContent method of this class.




Parameters
================


- uids

    

- fileUids

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightDbSynchronizerService::getIndexDiff](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L938-L968)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [getMysqlInfoUtil](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getMysqlInfoUtil.md)<br>Next method: [cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/cleanColumnTypes.md)<br>

