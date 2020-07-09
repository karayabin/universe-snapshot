[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupHasPluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md)


UserGroupHasPluginOptionApiInterface::delete
================



UserGroupHasPluginOptionApiInterface::delete — Deletes the userGroupHasPluginOption rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserGroupHasPluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userGroupHasPluginOption rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [UserGroupHasPluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.php#L166-L166)


See Also
================

The [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md) class.

Previous method: [updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)<br>Next method: [deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)<br>

