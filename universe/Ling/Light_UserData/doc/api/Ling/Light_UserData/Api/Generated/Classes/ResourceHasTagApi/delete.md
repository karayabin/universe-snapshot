[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Classes\ResourceHasTagApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md)


ResourceHasTagApi::delete
================



ResourceHasTagApi::delete — Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [ResourceHasTagApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [ResourceHasTagApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceHasTagApi.php#L275-L279)


See Also
================

The [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md) class.

Previous method: [updateResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/updateResourceHasTag.md)<br>Next method: [deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIdAndTagId.md)<br>

