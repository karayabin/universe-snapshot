[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)


ResourceApiInterface::delete
================



ResourceApiInterface::delete — Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceApiInterface.php#L212-L212)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) class.

Previous method: [updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceByResourceIdentifier.md)<br>Next method: [deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceById.md)<br>

