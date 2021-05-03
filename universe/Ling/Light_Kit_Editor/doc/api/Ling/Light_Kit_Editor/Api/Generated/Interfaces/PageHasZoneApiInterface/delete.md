[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageHasZoneApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md)


PageHasZoneApiInterface::delete
================



PageHasZoneApiInterface::delete — Deletes the pageHasZone rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [PageHasZoneApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the pageHasZone rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [PageHasZoneApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageHasZoneApiInterface.php#L227-L227)


See Also
================

The [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md) class.

Previous method: [updatePageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/updatePageHasZone.md)<br>Next method: [deletePageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/deletePageHasZoneByPageIdAndZoneId.md)<br>

