[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Controller\LightKitAdminController class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController.md)


LightKitAdminController::checkRight
================



LightKitAdminController::checkRight — Ensures that the current user is connected and has the right provided in the arguments.




Description
================


protected [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkRight.md)(string $right) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | null




Ensures that the current user is connected and has the right provided in the arguments.
If not, returns an httpRedirect response that redirects the user to a login page.




Parameters
================


- right

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | null.








Source Code
===========
See the source code for method [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/LightKitAdminController.php#L177-L202)


See Also
================

The [LightKitAdminController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController.md) class.

Previous method: [getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getRedirectResponseByRoute.md)<br>Next method: [checkMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkMicroPermission.md)<br>

