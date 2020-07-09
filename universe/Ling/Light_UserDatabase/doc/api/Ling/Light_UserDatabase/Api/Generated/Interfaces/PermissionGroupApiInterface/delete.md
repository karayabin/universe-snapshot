[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md)


PermissionGroupApiInterface::delete
================



PermissionGroupApiInterface::delete — Deletes the permissionGroup rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [PermissionGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the permissionGroup rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [PermissionGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PermissionGroupApiInterface.php#L258-L258)


See Also
================

The [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md) class.

Previous method: [updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroupByName.md)<br>Next method: [deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupById.md)<br>

