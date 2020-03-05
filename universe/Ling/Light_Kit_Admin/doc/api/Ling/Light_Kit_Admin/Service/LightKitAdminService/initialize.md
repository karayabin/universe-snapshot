[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Service\LightKitAdminService class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)


LightKitAdminService::initialize
================



LightKitAdminService::initialize — Listener for the [Light.initialize_2 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightKitAdminService::initialize](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Light.initialize_2 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
It will populate the light kit admin data into the tables from the [Light_UserDatabase plugin](https://github.com/lingtalfi/Light_UserDatabase).

This listener depends on Light_UserDatabase plugin being installed first (hence using a level 2 light initializer).
See more details on the [light events page](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Parameters
================


- event

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminService::initialize](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php#L203-L212)


See Also
================

The [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md) class.

Previous method: [getUrlByController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getUrlByController.md)<br>Next method: [installDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/installDatabase.md)<br>

