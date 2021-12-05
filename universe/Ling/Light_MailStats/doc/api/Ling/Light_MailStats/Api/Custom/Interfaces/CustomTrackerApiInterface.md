[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The CustomTrackerApiInterface class
================
2021-06-18 --> 2021-06-25






Introduction
============

The CustomTrackerApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomTrackerApiInterface</span> implements [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md) {

- Inherited methods
    - abstract public [TrackerApiInterface::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTracker.md)(array $tracker, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TrackerApiInterface::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTrackers.md)(array $trackers, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TrackerApiInterface::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [TrackerApiInterface::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [TrackerApiInterface::getTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackerById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TrackerApiInterface::getTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTracker.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TrackerApiInterface::getTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackers.md)($where, ?array $markers = []) : array
    - abstract public [TrackerApiInterface::getTrackersColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [TrackerApiInterface::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [TrackerApiInterface::getTrackersKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [TrackerApiInterface::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getAllIds.md)() : array
    - abstract public [TrackerApiInterface::updateTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/updateTrackerById.md)(int $id, array $tracker, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [TrackerApiInterface::updateTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/updateTracker.md)(array $tracker, ?$where = null, ?array $markers = []) : void
    - abstract public [TrackerApiInterface::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [TrackerApiInterface::deleteTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/deleteTrackerById.md)(int $id) : void
    - abstract public [TrackerApiInterface::deleteTrackerByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/deleteTrackerByIds.md)(array $ids) : void

}






Methods
==============

- [TrackerApiInterface::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTracker.md) &ndash; Inserts the given tracker in the database.
- [TrackerApiInterface::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTrackers.md) &ndash; Inserts the given tracker rows in the database.
- [TrackerApiInterface::fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [TrackerApiInterface::fetch](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [TrackerApiInterface::getTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackerById.md) &ndash; Returns the tracker row identified by the given id.
- [TrackerApiInterface::getTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTracker.md) &ndash; Returns the tracker row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApiInterface::getTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackers.md) &ndash; Returns the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApiInterface::getTrackersColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApiInterface::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumns.md) &ndash; Returns a subset of the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApiInterface::getTrackersKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersKey2Value.md) &ndash; Returns an array of $key => $value from the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TrackerApiInterface::getAllIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getAllIds.md) &ndash; Returns an array of all tracker ids.
- [TrackerApiInterface::updateTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/updateTrackerById.md) &ndash; Updates the tracker row identified by the given id.
- [TrackerApiInterface::updateTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/updateTracker.md) &ndash; Updates the tracker row.
- [TrackerApiInterface::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/delete.md) &ndash; Deletes the tracker rows matching the given where conditions, and returns the number of deleted rows.
- [TrackerApiInterface::deleteTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/deleteTrackerById.md) &ndash; Deletes the tracker identified by the given id.
- [TrackerApiInterface::deleteTrackerByIds](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/deleteTrackerByIds.md) &ndash; Deletes the tracker rows identified by the given ids.





Location
=============
Ling\Light_MailStats\Api\Custom\Interfaces\CustomTrackerApiInterface<br>
See the source code of [Ling\Light_MailStats\Api\Custom\Interfaces\CustomTrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Custom/Interfaces/CustomTrackerApiInterface.php)



SeeAlso
==============
Previous class: [CustomStatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Interfaces/CustomStatsApiInterface.md)<br>Next class: [LightMailStatsBaseApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/LightMailStatsBaseApi.md)<br>
