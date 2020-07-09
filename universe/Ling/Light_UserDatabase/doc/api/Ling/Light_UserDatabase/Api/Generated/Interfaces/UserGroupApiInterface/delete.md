[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface.md)


UserGroupApiInterface::delete
================



UserGroupApiInterface::delete — Deletes the userGroup rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userGroup rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [UserGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserGroupApiInterface.php#L235-L235)


See Also
================

The [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface.md) class.

Previous method: [updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/updateUserGroupByName.md)<br>Next method: [deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/deleteUserGroupById.md)<br>

