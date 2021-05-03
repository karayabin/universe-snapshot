[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The ZoneHasWidgetApiInterface class
================
2021-03-01 --> 2021-03-09






Introduction
============

The ZoneHasWidgetApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">ZoneHasWidgetApiInterface</span>  {

- Methods
    - abstract public [insertZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/insertZoneHasWidget.md)(array $zoneHasWidget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/insertZoneHasWidgets.md)(array $zoneHasWidgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgets.md)($where, ?array $markers = []) : array
    - abstract public [getZoneHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getZoneHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getZoneHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updateZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/updateZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id, array $zoneHasWidget, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/updateZoneHasWidget.md)(array $zoneHasWidget, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id) : void
    - abstract public [deleteZoneHasWidgetByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneIds.md)(array $zone_ids) : void
    - abstract public [deleteZoneHasWidgetByWidgetIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByWidgetIds.md)(array $widget_ids) : void
    - abstract public [deleteZoneHasWidgetByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneId.md)(int $zoneId) : void
    - abstract public [deleteZoneHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByWidgetId.md)(int $widgetId) : void

}






Methods
==============

- [ZoneHasWidgetApiInterface::insertZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/insertZoneHasWidget.md) &ndash; Inserts the given zone has widget in the database.
- [ZoneHasWidgetApiInterface::insertZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/insertZoneHasWidgets.md) &ndash; Inserts the given zone has widget rows in the database.
- [ZoneHasWidgetApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ZoneHasWidgetApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ZoneHasWidgetApiInterface::getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Returns the zone has widget row identified by the given zone_id and widget_id.
- [ZoneHasWidgetApiInterface::getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidget.md) &ndash; Returns the zoneHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApiInterface::getZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgets.md) &ndash; Returns the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApiInterface::getZoneHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApiInterface::getZoneHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsColumns.md) &ndash; Returns a subset of the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApiInterface::getZoneHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApiInterface::updateZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/updateZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Updates the zone has widget row identified by the given zone_id and widget_id.
- [ZoneHasWidgetApiInterface::updateZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/updateZoneHasWidget.md) &ndash; Updates the zone has widget row.
- [ZoneHasWidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/delete.md) &ndash; Deletes the zoneHasWidget rows matching the given where conditions, and returns the number of deleted rows.
- [ZoneHasWidgetApiInterface::deleteZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Deletes the zone has widget identified by the given zone_id and widget_id.
- [ZoneHasWidgetApiInterface::deleteZoneHasWidgetByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneIds.md) &ndash; Deletes the zone has widget rows identified by the given zone_ids.
- [ZoneHasWidgetApiInterface::deleteZoneHasWidgetByWidgetIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByWidgetIds.md) &ndash; Deletes the zone has widget rows identified by the given widget_ids.
- [ZoneHasWidgetApiInterface::deleteZoneHasWidgetByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByZoneId.md) &ndash; Deletes the zone has widget rows having the given zone id.
- [ZoneHasWidgetApiInterface::deleteZoneHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/deleteZoneHasWidgetByWidgetId.md) &ndash; Deletes the zone has widget rows having the given widget id.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneHasWidgetApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.php)



SeeAlso
==============
Previous class: [ZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface.md)<br>Next class: [LightKitEditorApiFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/LightKitEditorApiFactory.md)<br>
