[Back to the Ling/Light_DatabaseInfo api](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo.md)<br>
[Back to the Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService class](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService.md)


LightDatabaseInfoService::getTableInfo
================



LightDatabaseInfoService::getTableInfo — Returns the info array for the given table.




Description
================


public [LightDatabaseInfoService::getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md)(string $table, ?string $database = null, ?bool $reload = false) : array




Returns the info array for the given table.
The info array contains the following entries:

- columns: an array of the column names
- primary: an array of the column names of the primary key (empty if no primary key)
- types: an array of columnName => type
         Type is a string representing the mysql type ( ex: int(11), or varchar(128), ... ).
- ric: the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array
- autoIncrementedKey: the name of the auto-incremented column, or false (if there is no auto-incremented column)
- uniqueIndexes: It's an array of indexName => indexes. With indexes being an array of column names ordered by ascending index sequence.


If the reload flag is set to true, the cache will be refreshed before the result is returned.
Otherwise, if reload=false, the cached result will be returned.




Parameters
================


- table

    

- database

    

- reload

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabaseInfoService::getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/Service/LightDatabaseInfoService.php#L63-L93)


See Also
================

The [LightDatabaseInfoService](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/__construct.md)<br>Next method: [getTables](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTables.md)<br>

