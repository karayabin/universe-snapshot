[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Service\LightKitAdminService class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)


LightKitAdminService::onWebsiteUserLogin
================



LightKitAdminService::onWebsiteUserLogin — This method is called by default when a website user logs in.




Description
================


public [LightKitAdminService::onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onWebsiteUserLogin.md)(Ling\Light\Events\LightEvent $event) : void




This method is called by default when a website user logs in.
What we do is the following:

- if the Light_LoginNotifier plugin is installed, we call its onWebsiteUserLogin method.




Parameters
================


- event

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminService::onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php#L302-L316)


See Also
================

The [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md) class.

Previous method: [onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onLightExceptionCaught.md)<br>Next method: [getDuelistEngine](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getDuelistEngine.md)<br>

