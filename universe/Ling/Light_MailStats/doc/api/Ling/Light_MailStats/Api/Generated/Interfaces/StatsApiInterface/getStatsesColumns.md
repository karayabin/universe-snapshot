[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\StatsApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md)


StatsApiInterface::getStatsesColumns
================



StatsApiInterface::getStatsesColumns — Returns a subset of the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [StatsApiInterface::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumns.md)($columns, $where, ?array $markers = []) : array




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
See the source code for method [StatsApiInterface::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/StatsApiInterface.php#L159-L159)


See Also
================

The [StatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md) class.

Previous method: [getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumn.md)<br>Next method: [getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesKey2Value.md)<br>

