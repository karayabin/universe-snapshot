[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomZoneApi class
================
2021-03-01 --> 2021-03-09






Introduction
============

The CustomZoneApi class.



Class synopsis
==============


class <span class="pl-k">CustomZoneApi</span> extends [ZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi.md) implements [ZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface.md), [CustomZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomZoneApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneApi/__construct.md)() : void

- Inherited methods
    - public [ZoneApi::insertZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/insertZone.md)(array $zone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ZoneApi::insertZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/insertZones.md)(array $zones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ZoneApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/fetchAll.md)(?array $components = []) : array
    - public [ZoneApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/fetch.md)(?array $components = []) : array
    - public [ZoneApi::getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ZoneApi::getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ZoneApi::getZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ZoneApi::getZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZones.md)($where, ?array $markers = []) : array
    - public [ZoneApi::getZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ZoneApi::getZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ZoneApi::getZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ZoneApi::getZoneIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [ZoneApi::getZonesByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByPageId.md)(string $pageId) : array
    - public [ZoneApi::getZonesByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByPageIdentifier.md)(string $pageIdentifier) : array
    - public [ZoneApi::getZonesByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByWidgetId.md)(string $widgetId) : array
    - public [ZoneApi::getZoneIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByPageId.md)(string $pageId) : array
    - public [ZoneApi::getZoneIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByPageIdentifier.md)(string $pageIdentifier) : array
    - public [ZoneApi::getZoneIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByPageId.md)(string $pageId) : array
    - public [ZoneApi::getZoneIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByPageIdentifier.md)(string $pageIdentifier) : array
    - public [ZoneApi::getZoneIdsByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByWidgetId.md)(string $widgetId) : array
    - public [ZoneApi::getZoneIdentifiersByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByWidgetId.md)(string $widgetId) : array
    - public [ZoneApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getAllIds.md)() : array
    - public [ZoneApi::updateZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZoneById.md)(int $id, array $zone, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ZoneApi::updateZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZoneByIdentifier.md)(string $identifier, array $zone, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ZoneApi::updateZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZone.md)(array $zone, ?$where = null, ?array $markers = []) : void
    - public [ZoneApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ZoneApi::deleteZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneById.md)(int $id) : void
    - public [ZoneApi::deleteZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIdentifier.md)(string $identifier) : void
    - public [ZoneApi::deleteZoneByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIds.md)(array $ids) : void
    - public [ZoneApi::deleteZoneByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIdentifiers.md)(array $identifiers) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomZoneApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneApi/__construct.md) &ndash; Builds the CustomZoneApi instance.
- [ZoneApi::insertZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/insertZone.md) &ndash; Inserts the given zone in the database.
- [ZoneApi::insertZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/insertZones.md) &ndash; Inserts the given zone rows in the database.
- [ZoneApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ZoneApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ZoneApi::getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneById.md) &ndash; Returns the zone row identified by the given id.
- [ZoneApi::getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneByIdentifier.md) &ndash; Returns the zone row identified by the given identifier.
- [ZoneApi::getZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZone.md) &ndash; Returns the zone row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApi::getZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZones.md) &ndash; Returns the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApi::getZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApi::getZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesColumns.md) &ndash; Returns a subset of the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApi::getZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesKey2Value.md) &ndash; Returns an array of $key => $value from the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApi::getZoneIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdByIdentifier.md) &ndash; Returns the id of the lke_zone table.
- [ZoneApi::getZonesByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByPageId.md) &ndash; Returns the rows of the lke_zone table bound to the given page id.
- [ZoneApi::getZonesByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByPageIdentifier.md) &ndash; Returns the rows of the lke_zone table bound to the given page identifier.
- [ZoneApi::getZonesByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZonesByWidgetId.md) &ndash; Returns the rows of the lke_zone table bound to the given widget id.
- [ZoneApi::getZoneIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByPageId.md) &ndash; Returns an array of lke_zone.id bound to the given page id.
- [ZoneApi::getZoneIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByPageIdentifier.md) &ndash; Returns an array of lke_zone.id bound to the given page identifier.
- [ZoneApi::getZoneIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByPageId.md) &ndash; Returns an array of lke_zone.identifier bound to the given page id.
- [ZoneApi::getZoneIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByPageIdentifier.md) &ndash; Returns an array of lke_zone.identifier bound to the given page identifier.
- [ZoneApi::getZoneIdsByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdsByWidgetId.md) &ndash; Returns an array of lke_zone.id bound to the given widget id.
- [ZoneApi::getZoneIdentifiersByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneIdentifiersByWidgetId.md) &ndash; Returns an array of lke_zone.identifier bound to the given widget id.
- [ZoneApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getAllIds.md) &ndash; Returns an array of all zone ids.
- [ZoneApi::updateZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZoneById.md) &ndash; Updates the zone row identified by the given id.
- [ZoneApi::updateZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZoneByIdentifier.md) &ndash; Updates the zone row identified by the given identifier.
- [ZoneApi::updateZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/updateZone.md) &ndash; Updates the zone row.
- [ZoneApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/delete.md) &ndash; Deletes the zone rows matching the given where conditions, and returns the number of deleted rows.
- [ZoneApi::deleteZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneById.md) &ndash; Deletes the zone identified by the given id.
- [ZoneApi::deleteZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIdentifier.md) &ndash; Deletes the zone identified by the given identifier.
- [ZoneApi::deleteZoneByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIds.md) &ndash; Deletes the zone rows identified by the given ids.
- [ZoneApi::deleteZoneByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/deleteZoneByIdentifiers.md) &ndash; Deletes the zone rows identified by the given identifiers.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomZoneApi.php)



SeeAlso
==============
Previous class: [CustomWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomWidgetApi.md)<br>Next class: [CustomZoneHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneHasWidgetApi.md)<br>
