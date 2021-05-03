[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageHasZoneApiInterface class
================
2021-03-01 --> 2021-03-09






Introduction
============

The CustomPageHasZoneApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPageHasZoneApiInterface</span> implements [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md) {

- Inherited methods
    - abstract public [PageHasZoneApiInterface::insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZone.md)(array $pageHasZone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageHasZoneApiInterface::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZones.md)(array $pageHasZones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageHasZoneApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [PageHasZoneApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageHasZoneApiInterface::getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageHasZoneApiInterface::getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZones.md)($where, ?array $markers = []) : array
    - abstract public [PageHasZoneApiInterface::getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PageHasZoneApiInterface::getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PageHasZoneApiInterface::getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PageHasZoneApiInterface::updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, array $pageHasZone, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PageHasZoneApiInterface::updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZone.md)(array $pageHasZone, ?$where = null, ?array $markers = []) : void
    - abstract public [PageHasZoneApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PageHasZoneApiInterface::deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id) : void
    - abstract public [PageHasZoneApiInterface::deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIds.md)(array $page_ids) : void
    - abstract public [PageHasZoneApiInterface::deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneIds.md)(array $zone_ids) : void
    - abstract public [PageHasZoneApiInterface::deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageId.md)(int $pageId) : void
    - abstract public [PageHasZoneApiInterface::deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneId.md)(int $zoneId) : void

}






Methods
==============

- [PageHasZoneApiInterface::insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZone.md) &ndash; Inserts the given page has zone in the database.
- [PageHasZoneApiInterface::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZones.md) &ndash; Inserts the given page has zone rows in the database.
- [PageHasZoneApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageHasZoneApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZoneByPageIdAndZoneId.md) &ndash; Returns the page has zone row identified by the given page_id and zone_id.
- [PageHasZoneApiInterface::getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZone.md) &ndash; Returns the pageHasZone row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApiInterface::getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZones.md) &ndash; Returns the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApiInterface::getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApiInterface::getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumns.md) &ndash; Returns a subset of the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApiInterface::getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesKey2Value.md) &ndash; Returns an array of $key => $value from the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApiInterface::updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZoneByPageIdAndZoneId.md) &ndash; Updates the page has zone row identified by the given page_id and zone_id.
- [PageHasZoneApiInterface::updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZone.md) &ndash; Updates the page has zone row.
- [PageHasZoneApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/delete.md) &ndash; Deletes the pageHasZone rows matching the given where conditions, and returns the number of deleted rows.
- [PageHasZoneApiInterface::deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIdAndZoneId.md) &ndash; Deletes the page has zone identified by the given page_id and zone_id.
- [PageHasZoneApiInterface::deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIds.md) &ndash; Deletes the page has zone rows identified by the given page_ids.
- [PageHasZoneApiInterface::deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneIds.md) &ndash; Deletes the page has zone rows identified by the given zone_ids.
- [PageHasZoneApiInterface::deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageId.md) &ndash; Deletes the page has zone rows having the given page id.
- [PageHasZoneApiInterface::deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneId.md) &ndash; Deletes the page has zone rows having the given zone id.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasZoneApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomPageHasZoneApiInterface.php)



SeeAlso
==============
Previous class: [CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md)<br>Next class: [CustomWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomWidgetApiInterface.md)<br>
