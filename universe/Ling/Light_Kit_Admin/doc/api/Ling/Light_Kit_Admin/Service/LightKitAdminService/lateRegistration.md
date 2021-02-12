[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Service\LightKitAdminService class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)


LightKitAdminService::lateRegistration
================



LightKitAdminService::lateRegistration — Allows lka plugins to register their services to some plugins in a dynamic way.




Description
================


public [LightKitAdminService::lateRegistration](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/lateRegistration.md)(string $type, string $identifier) : void




Allows lka plugins to register their services to some plugins in a dynamic way.

See the [late registration concept](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md) for more details.

The services plugins can register to are defined in the type, which can be one of:

- realform: [the realform service](https://github.com/lingtalfi/Light_Realform)


If the type is realform, then the identifier must be of the form:

- planet.formIdentifier

With:

- planet: the planet name
- formIdentifier: an arbitrary identifier representing the form




Parameters
================


- type

    

- identifier

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminService::lateRegistration](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php#L341-L368)


See Also
================

The [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md) class.

Previous method: [onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onWebsiteUserLogin.md)<br>

