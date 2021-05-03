[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The ZoneApiInterface class
================
2021-03-01 --> 2021-03-09






Introduction
============

The ZoneApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">ZoneApiInterface</span>  {

- Methods
    - abstract public [insertZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/insertZone.md)(array $zone, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/insertZones.md)(array $zones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZone.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZones.md)($where, ?array $markers = []) : array
    - abstract public [getZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getZoneIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getZonesByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByPageId.md)(string $pageId) : array
    - abstract public [getZonesByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getZonesByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByWidgetId.md)(string $widgetId) : array
    - abstract public [getZoneIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByPageId.md)(string $pageId) : array
    - abstract public [getZoneIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getZoneIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByPageId.md)(string $pageId) : array
    - abstract public [getZoneIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getZoneIdsByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByWidgetId.md)(string $widgetId) : array
    - abstract public [getZoneIdentifiersByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByWidgetId.md)(string $widgetId) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getAllIds.md)() : array
    - abstract public [updateZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZoneById.md)(int $id, array $zone, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZoneByIdentifier.md)(string $identifier, array $zone, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZone.md)(array $zone, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneById.md)(int $id) : void
    - abstract public [deleteZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIdentifier.md)(string $identifier) : void
    - abstract public [deleteZoneByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIds.md)(array $ids) : void
    - abstract public [deleteZoneByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIdentifiers.md)(array $identifiers) : void

}






Methods
==============

- [ZoneApiInterface::insertZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/insertZone.md) &ndash; Inserts the given zone in the database.
- [ZoneApiInterface::insertZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/insertZones.md) &ndash; Inserts the given zone rows in the database.
- [ZoneApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ZoneApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ZoneApiInterface::getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneById.md) &ndash; Returns the zone row identified by the given id.
- [ZoneApiInterface::getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneByIdentifier.md) &ndash; Returns the zone row identified by the given identifier.
- [ZoneApiInterface::getZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZone.md) &ndash; Returns the zone row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApiInterface::getZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZones.md) &ndash; Returns the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApiInterface::getZonesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApiInterface::getZonesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesColumns.md) &ndash; Returns a subset of the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApiInterface::getZonesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesKey2Value.md) &ndash; Returns an array of $key => $value from the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneApiInterface::getZoneIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdByIdentifier.md) &ndash; Returns the id of the lke_zone table.
- [ZoneApiInterface::getZonesByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByPageId.md) &ndash; Returns the rows of the lke_zone table bound to the given page id.
- [ZoneApiInterface::getZonesByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByPageIdentifier.md) &ndash; Returns the rows of the lke_zone table bound to the given page identifier.
- [ZoneApiInterface::getZonesByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZonesByWidgetId.md) &ndash; Returns the rows of the lke_zone table bound to the given widget id.
- [ZoneApiInterface::getZoneIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByPageId.md) &ndash; Returns an array of lke_zone.id bound to the given page id.
- [ZoneApiInterface::getZoneIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByPageIdentifier.md) &ndash; Returns an array of lke_zone.id bound to the given page identifier.
- [ZoneApiInterface::getZoneIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByPageId.md) &ndash; Returns an array of lke_zone.identifier bound to the given page id.
- [ZoneApiInterface::getZoneIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByPageIdentifier.md) &ndash; Returns an array of lke_zone.identifier bound to the given page identifier.
- [ZoneApiInterface::getZoneIdsByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdsByWidgetId.md) &ndash; Returns an array of lke_zone.id bound to the given widget id.
- [ZoneApiInterface::getZoneIdentifiersByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneIdentifiersByWidgetId.md) &ndash; Returns an array of lke_zone.identifier bound to the given widget id.
- [ZoneApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getAllIds.md) &ndash; Returns an array of all zone ids.
- [ZoneApiInterface::updateZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZoneById.md) &ndash; Updates the zone row identified by the given id.
- [ZoneApiInterface::updateZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZoneByIdentifier.md) &ndash; Updates the zone row identified by the given identifier.
- [ZoneApiInterface::updateZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/updateZone.md) &ndash; Updates the zone row.
- [ZoneApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/delete.md) &ndash; Deletes the zone rows matching the given where conditions, and returns the number of deleted rows.
- [ZoneApiInterface::deleteZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneById.md) &ndash; Deletes the zone identified by the given id.
- [ZoneApiInterface::deleteZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIdentifier.md) &ndash; Deletes the zone identified by the given identifier.
- [ZoneApiInterface::deleteZoneByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIds.md) &ndash; Deletes the zone rows identified by the given ids.
- [ZoneApiInterface::deleteZoneByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/deleteZoneByIdentifiers.md) &ndash; Deletes the zone rows identified by the given identifiers.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/ZoneApiInterface.php)



SeeAlso
==============
Previous class: [WidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md)<br>Next class: [ZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md)<br>
