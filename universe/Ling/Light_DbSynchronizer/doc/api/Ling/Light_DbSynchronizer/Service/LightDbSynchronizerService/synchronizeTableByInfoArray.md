[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::synchronizeTableByInfoArray
================



LightDbSynchronizerService::synchronizeTableByInfoArray — Synchronizes a table by the given info array.




Description
================


protected [LightDbSynchronizerService::synchronizeTableByInfoArray](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronizeTableByInfoArray.md)(string $table, array $fileInfo, array $options) : void




Synchronizes a table by the given info array.



The available options are:

- tableStatements: an array of tableName => tableCreateStatement
     This is actually mandatory.

- renamedItems: an array of renamed items, see the [getRenamedItems method's comments](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php) for more details.




Parameters
================


- table

    

- fileInfo

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDbSynchronizerService::synchronizeTableByInfoArray](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L404-L763)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [getLogDebugMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogDebugMessages.md)<br>Next method: [executeStatement](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/executeStatement.md)<br>

