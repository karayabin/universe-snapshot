[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\ZoneHasWidgetApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi.md)


ZoneHasWidgetApi::delete
================



ZoneHasWidgetApi::delete — Deletes the zoneHasWidget rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [ZoneHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the zoneHasWidget rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [ZoneHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/ZoneHasWidgetApi.php#L275-L279)


See Also
================

The [ZoneHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi.md) class.

Previous method: [updateZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/updateZoneHasWidget.md)<br>Next method: [deleteZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneIdAndWidgetId.md)<br>

