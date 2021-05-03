[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuAbstractHost class
================
2019-08-08 --> 2021-03-15






Introduction
============

The LightBMenuAbstractHost class.



Class synopsis
==============


abstract class <span class="pl-k">LightBMenuAbstractHost</span> implements [LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) {

- Properties
    - protected string [$menuStructureId](#property-menuStructureId) ;
    - protected string [$menuType](#property-menuType) ;
    - protected string|null [$defaultItemsParentPath](#property-defaultItemsParentPath) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/__construct.md)() : void
    - public [getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/getMenuStructureId.md)() : string
    - public [injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/injectDefaultItems.md)(array $items, [Ling\Light_BMenu\Menu\LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) $menu) : mixed
    - public [onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/onMenuCompiled.md)(array &$menu) : void
    - public [setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuType.md)(string $menuType) : void
    - public [setMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuStructureId.md)(string $menuStructureId) : void
    - public [setDefaultItemsParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setDefaultItemsParentPath.md)(string $defaultItemsParentPath) : void

- Inherited methods
    - abstract public [LightBMenuHostInterface::prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md)([Ling\Light_BMenu\Menu\LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) $menu) : mixed

}




Properties
=============

- <span id="property-menuStructureId"><b>menuStructureId</b></span>

    This property holds the menuStructureId for this instance.
    
    

- <span id="property-menuType"><b>menuType</b></span>

    This property holds the menuType for this instance.
    
    

- <span id="property-defaultItemsParentPath"><b>defaultItemsParentPath</b></span>

    This property holds the defaultItemsParentPath for this instance.
    Where to inject the default items.
    Null means at the root of the menu.
    
    



Methods
==============

- [LightBMenuAbstractHost::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/__construct.md) &ndash; Builds the LightBMenuAbstractHost instance.
- [LightBMenuAbstractHost::getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/getMenuStructureId.md) &ndash; Returns the menu structure id for this host.
- [LightBMenuAbstractHost::injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/injectDefaultItems.md) &ndash; Inject menu items in the given menu structure.
- [LightBMenuAbstractHost::onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/onMenuCompiled.md) &ndash; This method is called after the menu has been compiled.
- [LightBMenuAbstractHost::setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuType.md) &ndash; Sets the menu type.
- [LightBMenuAbstractHost::setMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuStructureId.md) &ndash; Sets the menuStructureId.
- [LightBMenuAbstractHost::setDefaultItemsParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setDefaultItemsParentPath.md) &ndash; Sets the defaultItemsParentPath.
- [LightBMenuHostInterface::prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md) &ndash; Injects the base menu structure in the given menu.





Location
=============
Ling\Light_BMenu\Host\LightBMenuAbstractHost<br>
See the source code of [Ling\Light_BMenu\Host\LightBMenuAbstractHost](https://github.com/lingtalfi/Light_BMenu/blob/master/Host/LightBMenuAbstractHost.php)



SeeAlso
==============
Previous class: [LightBMenuException](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Exception/LightBMenuException.md)<br>Next class: [LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md)<br>
