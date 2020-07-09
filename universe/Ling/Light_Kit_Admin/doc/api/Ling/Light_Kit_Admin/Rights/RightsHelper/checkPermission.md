[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Rights\RightsHelper class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md)


RightsHelper::checkPermission
================



RightsHelper::checkPermission — Checks that the current user has the given permission, and throws an exception if that's not the case.




Description
================


public static [RightsHelper::checkPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/checkPermission.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $permission) : void




Checks that the current user has the given permission, and throws an exception if that's not the case.




Parameters
================


- container

    

- permission

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RightsHelper::checkPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Rights/RightsHelper.php#L64-L69)


See Also
================

The [RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md) class.

Previous method: [hasPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasPermission.md)<br>Next method: [hasMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasMicroPermission.md)<br>

