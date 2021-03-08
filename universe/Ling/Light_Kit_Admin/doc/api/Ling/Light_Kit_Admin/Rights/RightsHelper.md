[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The RightsHelper class
================
2019-05-17 --> 2021-03-05






Introduction
============

The RightsHelper class.



Class synopsis
==============


class <span class="pl-k">RightsHelper</span>  {

- Methods
    - public static [isRoot](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/isRoot.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : bool
    - public static [hasPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasPermission.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $permission) : bool
    - public static [checkPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/checkPermission.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $permission) : void
    - public static [hasMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasMicroPermission.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $permission) : bool
    - public static [getGroupedRights](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/getGroupedRights.md)(array $rights, ?bool $keepPluginName = false) : array

}






Methods
==============

- [RightsHelper::isRoot](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/isRoot.md) &ndash; Returns whether the current (website) user is root.
- [RightsHelper::hasPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasPermission.md) &ndash; Returns whether the current user has the given permission.
- [RightsHelper::checkPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/checkPermission.md) &ndash; Checks that the current user has the given permission, and throws an exception if that's not the case.
- [RightsHelper::hasMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/hasMicroPermission.md) &ndash; Returns whether the current user has the given micro-permission.
- [RightsHelper::getGroupedRights](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/getGroupedRights.md) &ndash; Returns the array of rights grouped by plugin names.





Location
=============
Ling\Light_Kit_Admin\Rights\RightsHelper<br>
See the source code of [Ling\Light_Kit_Admin\Rights\RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Rights/RightsHelper.php)



SeeAlso
==============
Previous class: [LightKitAdminRealistListRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListRenderer.md)<br>Next class: [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)<br>
