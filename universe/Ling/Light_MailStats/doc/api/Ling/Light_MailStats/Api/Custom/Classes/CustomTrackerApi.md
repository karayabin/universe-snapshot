[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The CustomTrackerApi class
================
2021-06-18 --> 2021-06-25






Introduction
============

The CustomTrackerApi class.



Class synopsis
==============


class <span class="pl-k">CustomTrackerApi</span> extends [TrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi.md) implements [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md), [CustomTrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Interfaces/CustomTrackerApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightMailStatsBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightMailStatsBaseApi::$container](#property-container) ;
    - protected string [LightMailStatsBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Classes/CustomTrackerApi/__construct.md)() : void

- Inherited methods
    - public [TrackerApi::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTracker.md)(array $tracker, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [TrackerApi::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTrackers.md)(array $trackers, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [TrackerApi::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/fetchAll.md)(?array $components = []) : array
    - public [TrackerApi::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/fetch.md)(?array $components = []) : array
    - public [TrackerApi::getTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackerById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TrackerApi::getTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTracker.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TrackerApi::getTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackers.md)($where, ?array $markers = []) : array
    - public [TrackerApi::getTrackersColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [TrackerApi::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersColumns.md)($columns, $where, ?array $markers = []) : array
    - public [TrackerApi::getTrackersKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [TrackerApi::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getAllIds.md)() : array
    - public [TrackerApi::updateTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/updateTrackerById.md)(int $id, array $tracker, ?array $extraWhere = [], ?array $markers = []) : void
    - public [TrackerApi::updateTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/updateTracker.md)(array $tracker, ?$where = null, ?array $markers = []) : void
    - public [TrackerApi::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [TrackerApi::deleteTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/deleteTrackerById.md)(int $id) : void
    - public [TrackerApi::deleteTrackerByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/deleteTrackerByIds.md)(array $ids) : void
    - public [LightMailStatsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightMailStatsBaseApi::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomTrackerApi::__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Classes/CustomTrackerApi/__construct.md) &ndash; Builds the CustomTrackerApi instance.
- [TrackerApi::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTracker.md) &ndash; Inserts the given tracker in the database.
- [TrackerApi::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTrackers.md) &ndash; Inserts the given tracker rows in the database.
- [TrackerApi::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [TrackerApi::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [TrackerApi::getTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackerById.md) &ndash; Returns the tracker row identified by the given id.
- [TrackerApi::getTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTracker.md) &ndash; Returns the tracker row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApi::getTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackers.md) &ndash; Returns the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApi::getTrackersColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApi::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersColumns.md) &ndash; Returns a subset of the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApi::getTrackersKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getTrackersKey2Value.md) &ndash; Returns an array of $key => $value from the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApi::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/getAllIds.md) &ndash; Returns an array of all tracker ids.
- [TrackerApi::updateTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/updateTrackerById.md) &ndash; Updates the tracker row identified by the given id.
- [TrackerApi::updateTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/updateTracker.md) &ndash; Updates the tracker row.
- [TrackerApi::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/delete.md) &ndash; Deletes the tracker rows matching the given where conditions, and returns the number of deleted rows.
- [TrackerApi::deleteTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/deleteTrackerById.md) &ndash; Deletes the tracker identified by the given id.
- [TrackerApi::deleteTrackerByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/deleteTrackerByIds.md) &ndash; Deletes the tracker rows identified by the given ids.
- [LightMailStatsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightMailStatsBaseApi::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_MailStats\Api\Custom\Classes\CustomTrackerApi<br>
See the source code of [Ling\Light_MailStats\Api\Custom\Classes\CustomTrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Custom/Classes/CustomTrackerApi.php)



SeeAlso
==============
Previous class: [CustomStatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Classes/CustomStatsApi.md)<br>Next class: [CustomLightMailStatsApiFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/CustomLightMailStatsApiFactory.md)<br>
