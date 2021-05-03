[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The PageHasZoneApiInterface class
================
2021-03-01 --> 2021-03-09






Introduction
============

The PageHasZoneApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PageHasZoneApiInterface</span>  {

- Methods
    - abstract public [insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZone.md)(array $pageHasZone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZones.md)(array $pageHasZones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZones.md)($where, ?array $markers = []) : array
    - abstract public [getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, array $pageHasZone, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZone.md)(array $pageHasZone, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id) : void
    - abstract public [deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIds.md)(array $page_ids) : void
    - abstract public [deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneIds.md)(array $zone_ids) : void
    - abstract public [deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageId.md)(int $pageId) : void
    - abstract public [deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByZoneId.md)(int $zoneId) : void

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
Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageHasZoneApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageHasZoneApiInterface.php)



SeeAlso
==============
Previous class: [PageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface.md)<br>Next class: [WidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md)<br>
