[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminBMenuRegistrationUtil class
================
2019-05-17 --> 2021-07-30






Introduction
============

The LightKitAdminBMenuRegistrationUtil class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminBMenuRegistrationUtil</span>  {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [writeItemsToMainMenuSection](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/writeItemsToMainMenuSection.md)(string $section, array $items) : void
    - public [removeItemsFromMainMenuSection](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/removeItemsFromMainMenuSection.md)(string $section, array $items) : void
    - private [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminBMenuRegistrationUtil::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/__construct.md) &ndash; Builds the LightKitAdminBMenuRegistrationUtil instance.
- [LightKitAdminBMenuRegistrationUtil::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/setContainer.md) &ndash; Sets the container.
- [LightKitAdminBMenuRegistrationUtil::writeItemsToMainMenuSection](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/writeItemsToMainMenuSection.md) &ndash; Adds menu items in a section of the admin main menu.
- [LightKitAdminBMenuRegistrationUtil::removeItemsFromMainMenuSection](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/removeItemsFromMainMenuSection.md) &ndash; Removes menu items from a section of the admin main menu.
- [LightKitAdminBMenuRegistrationUtil::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil<br>
See the source code of [Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil.php)



SeeAlso
==============
Previous class: [LightKitAdminBMenuModifier](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier.md)<br>Next class: [LightKitAdminControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_ControllerHub/LightKitAdminControllerHubHandler.md)<br>
