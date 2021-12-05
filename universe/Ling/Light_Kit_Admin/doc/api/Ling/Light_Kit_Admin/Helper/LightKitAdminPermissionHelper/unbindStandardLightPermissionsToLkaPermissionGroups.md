[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Helper\LightKitAdminPermissionHelper class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper.md)


LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups
================



LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups — Unbinds the permissions of the given $planetDotName from the main lka permission groups.




Description
================


public static [LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper/unbindStandardLightPermissionsToLkaPermissionGroups.md)(Ling\Light_UserDatabase\Service\LightUserDatabaseService $userDb, string $planetDotName) : void




Unbinds the permissions of the given $planetDotName from the main lka permission groups.



Note: the main lka permission groups are:
- Ling.Light_Kit_Admin.admin
- Ling.Light_Kit_Admin.user




Parameters
================


- userDb

    

- planetDotName

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Helper/LightKitAdminPermissionHelper.php#L72-L100)


See Also
================

The [LightKitAdminPermissionHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper.md) class.

Previous method: [bindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper/bindStandardLightPermissionsToLkaPermissionGroups.md)<br>

