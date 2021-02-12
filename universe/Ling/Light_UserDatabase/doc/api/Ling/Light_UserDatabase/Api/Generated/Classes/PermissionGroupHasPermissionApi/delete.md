[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupHasPermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md)


PermissionGroupHasPermissionApi::delete
================



PermissionGroupHasPermissionApi::delete — Deletes the permissionGroupHasPermission rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [PermissionGroupHasPermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the permissionGroupHasPermission rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [PermissionGroupHasPermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionGroupHasPermissionApi.php#L275-L279)


See Also
================

The [PermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md) class.

Previous method: [updatePermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/updatePermissionGroupHasPermission.md)<br>Next method: [deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)<br>

