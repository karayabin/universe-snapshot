[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageHasZoneApi class
================
2021-03-01 --> 2021-03-09






Introduction
============

The CustomPageHasZoneApi class.



Class synopsis
==============


class <span class="pl-k">CustomPageHasZoneApi</span> extends [PageHasZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi.md) implements [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md), [CustomPageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageHasZoneApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageHasZoneApi/__construct.md)() : void

- Inherited methods
    - public [PageHasZoneApi::insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZone.md)(array $pageHasZone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageHasZoneApi::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/insertPageHasZones.md)(array $pageHasZones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageHasZoneApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetchAll.md)(?array $components = []) : array
    - public [PageHasZoneApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/fetch.md)(?array $components = []) : array
    - public [PageHasZoneApi::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageHasZoneApi::getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageHasZoneApi::getPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZones.md)($where, ?array $markers = []) : array
    - public [PageHasZoneApi::getPageHasZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PageHasZoneApi::getPageHasZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PageHasZoneApi::getPageHasZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/getPageHasZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PageHasZoneApi::updatePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, array $pageHasZone, ?array $extraWhere = [], ?array $markers = []) : void
    - public [PageHasZoneApi::updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/updatePageHasZone.md)(array $pageHasZone, ?$where = null, ?array $markers = []) : void
    - public [PageHasZoneApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PageHasZoneApi::deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id) : void
    - public [PageHasZoneApi::deletePageHasZoneByPageIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageIds.md)(array $page_ids) : void
    - public [PageHasZoneApi::deletePageHasZoneByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneIds.md)(array $zone_ids) : void
    - public [PageHasZoneApi::deletePageHasZoneByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByPageId.md)(int $pageId) : void
    - public [PageHasZoneApi::deletePageHasZoneByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasZoneApi/deletePageHasZoneByZoneId.md)(int $zoneId) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPageHasZoneApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageHasZoneApi/__construct.md) &ndash; Builds the CustomPageHasZoneApi instance.
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
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasZoneApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomPageHasZoneApi.php)



SeeAlso
==============
Previous class: [CustomPageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi.md)<br>Next class: [CustomWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomWidgetApi.md)<br>
