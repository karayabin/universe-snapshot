[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::checkPermission
================



LightUserDataService::checkPermission — Checks that the current user has the given permission.




Description
================


protected [LightUserDataService::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkPermission.md)(?string $permission = null) : void




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
See the source code for method [LightUserDataService::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1493-L1502)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md)<br>Next method: [updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateUserGroupHasPluginOptionTable.md)<br>

