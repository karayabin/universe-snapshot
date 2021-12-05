[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Classes\StatsApi class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi.md)


StatsApi::getStatsesColumns
================



StatsApi::getStatsesColumns — Returns a subset of the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [StatsApi::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [StatsApi::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Classes/StatsApi.php#L214-L223)


See Also
================

The [StatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi.md) class.

Previous method: [getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumn.md)<br>Next method: [getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesKey2Value.md)<br>

