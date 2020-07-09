[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi.md)


PermissionApi::delete
================



PermissionApi::delete — Deletes the permission rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [PermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the permission rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [PermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionApi.php#L254-L258)


See Also
================

The [PermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi.md) class.

Previous method: [updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/updatePermissionByName.md)<br>Next method: [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionById.md)<br>

