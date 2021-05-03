[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::getColDefinition
================



LightDbSynchronizerService::getColDefinition — Returns the column definition to use in an alter statement for the given column.




Description
================


private [LightDbSynchronizerService::getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getColDefinition.md)(string $col, array $fileInfo, ?string $type = add, ?array $options = []) : string




Returns the column definition to use in an alter statement for the given column.

The type defines which type of alter function to call.
The possible values are:

- add: to add the column (default value)
- update: to update the column
- rename: to rename the column, in which case the newName option must be defined.


Available options are:

- oldName: string, the name of the renamed column (if type=rename) before the renaming




Parameters
================


- col

    

- fileInfo

    

- type

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDbSynchronizerService::getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L954-L1006)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/cleanColumnTypes.md)<br>Next method: [addStatementsForIndex](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/addStatementsForIndex.md)<br>

