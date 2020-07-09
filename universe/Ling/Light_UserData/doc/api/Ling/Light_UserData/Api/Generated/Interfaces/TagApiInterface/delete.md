[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md)


TagApiInterface::delete
================



TagApiInterface::delete — Deletes the tag rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [TagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the tag rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [TagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/TagApiInterface.php#L258-L258)


See Also
================

The [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md) class.

Previous method: [updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagByName.md)<br>Next method: [deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagById.md)<br>

