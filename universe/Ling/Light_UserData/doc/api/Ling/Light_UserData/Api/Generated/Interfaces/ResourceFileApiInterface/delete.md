[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceFileApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md)


ResourceFileApiInterface::delete
================



ResourceFileApiInterface::delete — Deletes the resourceFile rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [ResourceFileApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the resourceFile rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [ResourceFileApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceFileApiInterface.php#L232-L232)


See Also
================

The [ResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md) class.

Previous method: [updateResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/updateResourceFile.md)<br>Next method: [deleteResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileById.md)<br>

