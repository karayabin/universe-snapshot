[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuService class
================
2019-08-08 --> 2021-03-18






Introduction
============

The LightBMenuService class.

This class can return menus created collaboratively with
some hosts and some participant plugins.


Each host is first prompted to create the main menu structure.
Then plugins (aka subscribers) are then called to complement the host menu.


The menu item structure is defined in the [bmenu conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md).


Each host is bound to a menuType (like "main menu" for instance), so that we can have multiple
menus displayed on the same page.



Class synopsis
==============


class <span class="pl-k">LightBMenuService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - private [Ling\Light_BMenu\MenuModifier\MenuModifierInterface[]](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface.md) [$menuModifiers](#property-menuModifiers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [addMenuModifier](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addMenuModifier.md)([Ling\Light_BMenu\MenuModifier\MenuModifierInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface.md) $modifier) : void
    - public [getMenusBaseDir](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getMenusBaseDir.md)() : string
    - public [getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md)(string $menuName) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-menuModifiers"><b>menuModifiers</b></span>

    This property holds the menuModifiers for this instance.
    
    



Methods
==============

- [LightBMenuService::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md) &ndash; Builds the LightBMenuService instance.
- [LightBMenuService::setContainer](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/setContainer.md) &ndash; Sets the container.
- [LightBMenuService::addMenuModifier](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addMenuModifier.md) &ndash; Adds a menu modifier to the service instance.
- [LightBMenuService::getMenusBaseDir](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getMenusBaseDir.md) &ndash; Returns the path to the directory containing all the menus.
- [LightBMenuService::getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md) &ndash; Returns the computed menu items for the given menu name.





Location
=============
Ling\Light_BMenu\Service\LightBMenuService<br>
See the source code of [Ling\Light_BMenu\Service\LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/Service/LightBMenuService.php)



SeeAlso
==============
Previous class: [MenuModifierInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface.md)<br>Next class: [LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md)<br>
