[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Service\LightKitAdminService class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)


LightKitAdminService::onLightExceptionCaught
================



LightKitAdminService::onLightExceptionCaught — 




Description
================


public [LightKitAdminService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event) : void




Handles the following exceptions in a special way:

- LightKitAdminMicroPermissionDeniedException:
     redirect the user to the "access denied" page (access_denied.access_denied_route in the service configuration)




Parameters
================


- event

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php#L277-L287)


See Also
================

The [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md) class.

Previous method: [getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getRedirectResponseByRoute.md)<br>Next method: [onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onWebsiteUserLogin.md)<br>

