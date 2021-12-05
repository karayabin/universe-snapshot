[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The StatsApiInterface class
================
2021-06-18 --> 2021-06-25






Introduction
============

The StatsApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">StatsApiInterface</span>  {

- Methods
    - abstract public [insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStats.md)(array $stats, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStatses.md)(array $statses, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStats.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatses.md)($where, ?array $markers = []) : array
    - abstract public [getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getAllIds.md)() : array
    - abstract public [updateStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/updateStatsById.md)(int $id, array $stats, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/updateStats.md)(array $stats, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/deleteStatsById.md)(int $id) : void
    - abstract public [deleteStatsByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/deleteStatsByIds.md)(array $ids) : void

}






Methods
==============

- [StatsApiInterface::insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStats.md) &ndash; Inserts the given stats in the database.
- [StatsApiInterface::insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStatses.md) &ndash; Inserts the given stats rows in the database.
- [StatsApiInterface::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [StatsApiInterface::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [StatsApiInterface::getStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsById.md) &ndash; Returns the stats row identified by the given id.
- [StatsApiInterface::getStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStats.md) &ndash; Returns the stats row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApiInterface::getStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatses.md) &ndash; Returns the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApiInterface::getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApiInterface::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesColumns.md) &ndash; Returns a subset of the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApiInterface::getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getStatsesKey2Value.md) &ndash; Returns an array of $key => $value from the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApiInterface::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/getAllIds.md) &ndash; Returns an array of all stats ids.
- [StatsApiInterface::updateStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/updateStatsById.md) &ndash; Updates the stats row identified by the given id.
- [StatsApiInterface::updateStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/updateStats.md) &ndash; Updates the stats row.
- [StatsApiInterface::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/delete.md) &ndash; Deletes the stats rows matching the given where conditions, and returns the number of deleted rows.
- [StatsApiInterface::deleteStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/deleteStatsById.md) &ndash; Deletes the stats identified by the given id.
- [StatsApiInterface::deleteStatsByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/deleteStatsByIds.md) &ndash; Deletes the stats rows identified by the given ids.





Location
=============
Ling\Light_MailStats\Api\Generated\Interfaces\StatsApiInterface<br>
See the source code of [Ling\Light_MailStats\Api\Generated\Interfaces\StatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/StatsApiInterface.php)



SeeAlso
==============
Previous class: [TrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi.md)<br>Next class: [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md)<br>
