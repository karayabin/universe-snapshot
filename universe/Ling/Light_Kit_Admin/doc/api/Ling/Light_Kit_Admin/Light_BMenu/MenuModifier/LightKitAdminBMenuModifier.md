[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminBMenuModifier class
================
2019-05-17 --> 2021-05-31






Introduction
============

The LightKitAdminBMenuModifier class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminBMenuModifier</span> implements [MenuModifierInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [updateItems](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/updateItems.md)(string $menuName, array &$items) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminBMenuModifier::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/__construct.md) &ndash; Builds the LightKitAdminBMenuHost instance.
- [LightKitAdminBMenuModifier::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/setContainer.md) &ndash; Sets the container.
- [LightKitAdminBMenuModifier::updateItems](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier/updateItems.md) &ndash; Update the items of the menu.





Location
=============
Ling\Light_Kit_Admin\Light_BMenu\MenuModifier\LightKitAdminBMenuModifier<br>
See the source code of [Ling\Light_Kit_Admin\Light_BMenu\MenuModifier\LightKitAdminBMenuModifier](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Light_BMenu/MenuModifier/LightKitAdminBMenuModifier.php)



SeeAlso
==============
Previous class: [LightKitAdminPluginInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md)<br>Next class: [LightKitAdminBMenuRegistrationUtil](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_BMenu/Util/LightKitAdminBMenuRegistrationUtil.md)<br>
