[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceHasTagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md)


ResourceHasTagApiInterface::delete
================



ResourceHasTagApiInterface::delete — Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [ResourceHasTagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [ResourceHasTagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceHasTagApiInterface.php#L166-L166)


See Also
================

The [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md) class.

Previous method: [updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTagByResourceIdAndTagId.md)<br>Next method: [deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIdAndTagId.md)<br>

