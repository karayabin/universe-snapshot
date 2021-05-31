[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Helper\LightKitAdminPermissionHelper class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper.md)


LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups
================



LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups — Binds the permissions of the given $srcPlanetDotName to the main lka permission groups.




Description
================


public static [LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper/bindStandardLightPermissionsToLkaPermissionGroups.md)(Ling\Light_UserDatabase\Service\LightUserDatabaseService $userDb, string $srcPlanetDotName) : void




Binds the permissions of the given $srcPlanetDotName to the main lka permission groups.

The srcPlanetDotName is the name of the [light kit admin' source plugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/lka-plugins.md#light-kit-admin-source-and-port-plugin).


Note: the main lka permission groups are:
- Ling.Light_Kit_Admin.admin
- Ling.Light_Kit_Admin.user




Parameters
================


- userDb

    

- srcPlanetDotName

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Helper/LightKitAdminPermissionHelper.php#L31-L58)


See Also
================

The [LightKitAdminPermissionHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper.md) class.

Next method: [unbindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Helper/LightKitAdminPermissionHelper/unbindStandardLightPermissionsToLkaPermissionGroups.md)<br>

