[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)


LightDbSynchronizerService::cleanColumnTypes
================



LightDbSynchronizerService::cleanColumnTypes — Returns a cleaned columnTypes array.




Description
================


private [LightDbSynchronizerService::cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/cleanColumnTypes.md)(array $columnTypes) : array




Returns a cleaned columnTypes array.
By cleaned, I mean: the maximum display width specification is removed from
the int types except for tinyInt(1).


The reason is explained below:
https://docs.oracle.com/cd/E17952_01/mysql-8.0-relnotes-en/news-8-0-19.html

display width specification for int type is deprecated as of MySQL 8.0.17,
with exception of tinyInt(1) (which acts as a boolean column).




Parameters
================


- columnTypes

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightDbSynchronizerService::cleanColumnTypes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Service/LightDbSynchronizerService.php#L902-L928)


See Also
================

The [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) class.

Previous method: [getIndexDiff](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getIndexDiff.md)<br>Next method: [getColDefinition](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getColDefinition.md)<br>

