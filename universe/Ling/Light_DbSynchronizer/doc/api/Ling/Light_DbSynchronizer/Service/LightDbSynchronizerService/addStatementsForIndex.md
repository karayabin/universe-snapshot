[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::addStatementsForIndex
================



LightDbSynchronizerService::addStatementsForIndex — Adds the alter statements for index (regular or unique).




Description
================


private [LightDbSynchronizerService::addStatementsForIndex](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/addStatementsForIndex.md)(array $uidToAdd, array $uidToRemove, array $uidToModify, array &$alterStmts, ?bool $isUnique = false) : void




Adds the alter statements for index (regular or unique).




Parameters
================


- uidToAdd

    

- uidToRemove

    

- uidToModify

    

- alterStmts

    

- isUnique

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDbSynchronizerService::addStatementsForIndex](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L1086-L1117)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getColDefinition.md)<br>Next method: [logError](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/logError.md)<br>

