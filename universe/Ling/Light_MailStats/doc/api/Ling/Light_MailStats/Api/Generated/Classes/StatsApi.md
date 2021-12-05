[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The StatsApi class
================
2021-06-18 --> 2021-06-25






Introduction
============

The StatsApi class.



Class synopsis
==============


class <span class="pl-k">StatsApi</span> extends [CustomLightMailStatsBaseApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Classes/CustomLightMailStatsBaseApi.md) implements [StatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightMailStatsBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightMailStatsBaseApi::$container](#property-container) ;
    - protected string [LightMailStatsBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/__construct.md)() : void
    - public [insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/insertStats.md)(array $stats, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/insertStatses.md)(array $statses, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetch.md)(?array $components = []) : array
    - public [getStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStats.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatses.md)($where, ?array $markers = []) : array
    - public [getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getAllIds.md)() : array
    - public [updateStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/updateStatsById.md)(int $id, array $stats, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/updateStats.md)(array $stats, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/deleteStatsById.md)(int $id) : void
    - public [deleteStatsByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/deleteStatsByIds.md)(array $ids) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightMailStatsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightMailStatsBaseApi::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [StatsApi::__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/__construct.md) &ndash; Builds the StatsApi instance.
- [StatsApi::insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/insertStats.md) &ndash; Inserts the given stats in the database.
- [StatsApi::insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/insertStatses.md) &ndash; Inserts the given stats rows in the database.
- [StatsApi::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [StatsApi::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [StatsApi::getStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsById.md) &ndash; Returns the stats row identified by the given id.
- [StatsApi::getStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStats.md) &ndash; Returns the stats row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApi::getStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatses.md) &ndash; Returns the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApi::getStatsesColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApi::getStatsesColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesColumns.md) &ndash; Returns a subset of the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApi::getStatsesKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getStatsesKey2Value.md) &ndash; Returns an array of $key => $value from the stats rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [StatsApi::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/getAllIds.md) &ndash; Returns an array of all stats ids.
- [StatsApi::updateStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/updateStatsById.md) &ndash; Updates the stats row identified by the given id.
- [StatsApi::updateStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/updateStats.md) &ndash; Updates the stats row.
- [StatsApi::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/delete.md) &ndash; Deletes the stats rows matching the given where conditions, and returns the number of deleted rows.
- [StatsApi::deleteStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/deleteStatsById.md) &ndash; Deletes the stats identified by the given id.
- [StatsApi::deleteStatsByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/deleteStatsByIds.md) &ndash; Deletes the stats rows identified by the given ids.
- [StatsApi::fetchRoutine](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightMailStatsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightMailStatsBaseApi::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_MailStats\Api\Generated\Classes\StatsApi<br>
See the source code of [Ling\Light_MailStats\Api\Generated\Classes\StatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Classes/StatsApi.php)



SeeAlso
==============
Previous class: [LightMailStatsBaseApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi.md)<br>Next class: [TrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi.md)<br>
