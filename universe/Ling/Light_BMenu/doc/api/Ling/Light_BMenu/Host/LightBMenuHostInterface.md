[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuHostInterface class
================
2019-08-08 --> 2021-03-15






Introduction
============

The LightBMenuHostInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightBMenuHostInterface</span>  {

- Methods
    - abstract public [getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/getMenuStructureId.md)() : string
    - abstract public [prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md)([Ling\Light_BMenu\Menu\LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) $menu) : mixed
    - abstract public [injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/injectDefaultItems.md)(array $items, [Ling\Light_BMenu\Menu\LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) $menu) : mixed
    - abstract public [onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/onMenuCompiled.md)(array &$menu) : void
    - abstract public [setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/setMenuType.md)(string $menuType) : void

}






Methods
==============

- [LightBMenuHostInterface::getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/getMenuStructureId.md) &ndash; Returns the menu structure id for this host.
- [LightBMenuHostInterface::prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md) &ndash; Injects the base menu structure in the given menu.
- [LightBMenuHostInterface::injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/injectDefaultItems.md) &ndash; Inject menu items in the given menu structure.
- [LightBMenuHostInterface::onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/onMenuCompiled.md) &ndash; This method is called after the menu has been compiled.
- [LightBMenuHostInterface::setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/setMenuType.md) &ndash; Sets the menu type.





Location
=============
Ling\Light_BMenu\Host\LightBMenuHostInterface<br>
See the source code of [Ling\Light_BMenu\Host\LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/Host/LightBMenuHostInterface.php)



SeeAlso
==============
Previous class: [LightBMenuAbstractHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost.md)<br>Next class: [LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md)<br>
