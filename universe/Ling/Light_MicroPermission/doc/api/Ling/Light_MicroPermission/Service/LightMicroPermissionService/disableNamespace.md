[Back to the Ling/Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md)<br>
[Back to the Ling\Light_MicroPermission\Service\LightMicroPermissionService class](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService.md)


LightMicroPermissionService::disableNamespace
================



LightMicroPermissionService::disableNamespace — hasMicroPermission method will always return true for all micro-permissions of that namespace.




Description
================


public [LightMicroPermissionService::disableNamespace](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/disableNamespace.md)(string $namespace) : void




Disable the micro-permission system for the given namespace, so that the
hasMicroPermission method will always return true for all micro-permissions of that namespace.
This is mainly use for test purposes.




Parameters
================


- namespace

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightMicroPermissionService::disableNamespace](https://github.com/lingtalfi/Light_MicroPermission/blob/master/Service/LightMicroPermissionService.php#L67-L72)


See Also
================

The [LightMicroPermissionService](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/setContainer.md)<br>Next method: [restoreNamespaces](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/restoreNamespaces.md)<br>

