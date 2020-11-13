[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::checkPermission
================



LightUserDataServiceOld::checkPermission — Checks that the current user has the given permission.




Description
================


protected [LightUserDataServiceOld::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkPermission.md)(?string $permission = null) : void




Checks that the current user has the given permission.
If the given permission is null (by default), it defaults to: "Light_UserData.user".
See the [Light_UserData permissions document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/permissions.md) for more details.




Parameters
================


- permission

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataServiceOld::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1598-L1607)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkUserMaximumStorageLimit.md)<br>Next method: [updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/updateUserGroupHasPluginOptionTable.md)<br>

