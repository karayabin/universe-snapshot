[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The PageHasZoneApi class
================
2021-03-01 --> 2021-03-09






Introduction
============

The PageHasZoneApi class.



Class synopsis
==============


class <span class="pl-k">PageHasZoneApi</span> extends [CustomLightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomLightKitEditorBaseApi.md) implements [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/__construct.md)() : void
    - public [insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZone.md)(array $pageHasZone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZones.md)(array $pageHasZones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetch.md)(?array $components = []) : array
    - public [getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZones.md)($where, ?array $markers = []) : array
    - public [getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, array $pageHasZone, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZone.md)(array $pageHasZone, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id) : void
    - public [deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIds.md)(array $page_ids) : void
    - public [deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneIds.md)(array $zone_ids) : void
    - public [deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageId.md)(int $pageId) : void
    - public [deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneId.md)(int $zoneId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [PageHasZoneApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/__construct.md) &ndash; Builds the PageHasZoneApi instance.
- [PageHasZoneApi::insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZone.md) &ndash; Inserts the given page has zone in the database.
- [PageHasZoneApi::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZones.md) &ndash; Inserts the given page has zone rows in the database.
- [PageHasZoneApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageHasZoneApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageHasZoneApi::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZoneByPageIdAndZoneId.md) &ndash; Returns the page has zone row identified by the given page_id and zone_id.
- [PageHasZoneApi::getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZone.md) &ndash; Returns the pageHasZone row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApi::getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZones.md) &ndash; Returns the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApi::getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApi::getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumns.md) &ndash; Returns a subset of the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApi::getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesKey2Value.md) &ndash; Returns an array of $key => $value from the pageHasZone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasZoneApi::updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZoneByPageIdAndZoneId.md) &ndash; Updates the page has zone row identified by the given page_id and zone_id.
- [PageHasZoneApi::updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZone.md) &ndash; Updates the page has zone row.
- [PageHasZoneApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/delete.md) &ndash; Deletes the pageHasZone rows matching the given where conditions, and returns the number of deleted rows.
- [PageHasZoneApi::deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIdAndZoneId.md) &ndash; Deletes the page has zone identified by the given page_id and zone_id.
- [PageHasZoneApi::deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIds.md) &ndash; Deletes the page has zone rows identified by the given page_ids.
- [PageHasZoneApi::deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneIds.md) &ndash; Deletes the page has zone rows identified by the given zone_ids.
- [PageHasZoneApi::deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageId.md) &ndash; Deletes the page has zone rows having the given page id.
- [PageHasZoneApi::deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneId.md) &ndash; Deletes the page has zone rows having the given zone id.
- [PageHasZoneApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasZoneApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/PageHasZoneApi.php)



SeeAlso
==============
Previous class: [PageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi.md)<br>Next class: [WidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi.md)<br>
