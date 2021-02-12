[Back to the Ling/Light_LingStandardService api](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService.md)<br>
[Back to the Ling\Light_LingStandardService\Helper\LightLingStandardServiceHelper class](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Helper/LightLingStandardServiceHelper.md)


LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups
================



LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups — Binds the permissions of the given basePluginName to the main lka permission groups.




Description
================


public static [LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Helper/LightLingStandardServiceHelper/bindStandardLightPermissionsToLkaPermissionGroups.md)(Ling\Light_UserDatabase\Service\LightUserDatabaseService $userDb, string $basePluginName) : void




Binds the permissions of the given basePluginName to the main lka permission groups.

Note: the main lka permission groups are:
- Light_Kit_Admin.admin
- Light_Kit_Admin.user




Parameters
================


- userDb

    

- basePluginName

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups](https://github.com/lingtalfi/Light_LingStandardService/blob/master/Helper/LightLingStandardServiceHelper.php#L28-L55)


See Also
================

The [LightLingStandardServiceHelper](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Helper/LightLingStandardServiceHelper.md) class.



