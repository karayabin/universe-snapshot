[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenu class
================
2019-08-08 --> 2021-03-05






Introduction
============

The LightBMenu class.



Class synopsis
==============


class <span class="pl-k">LightBMenu</span> extends [DotMenu](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu.md)  {

- Inherited properties
    - protected string [DotMenu::$childrenKey](#property-childrenKey) ;
    - protected string [DotMenu::$idKey](#property-idKey) ;
    - protected array [DotMenu::$items](#property-items) ;
    - protected bool [DotMenu::$strictMode](#property-strictMode) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu/__construct.md)() : void

- Inherited methods
    - public DotMenu::appendItem(array $item, ?string $parentPath = null) : void
    - public DotMenu::getItems() : array
    - public DotMenu::setItems(array $items) : void
    - public DotMenu::setChildrenKey(string $childrenKey) : void
    - public DotMenu::setIdKey(string $idKey) : void
    - public DotMenu::setStrictMode(bool $strictMode) : void

}






Methods
==============

- [LightBMenu::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu/__construct.md) &ndash; Builds the DotMenu instance.
- DotMenu::appendItem &ndash; by the given $parentPath, which is a bdot path.
- DotMenu::getItems &ndash; Return the items.
- DotMenu::setItems &ndash; Sets the items.
- DotMenu::setChildrenKey &ndash; Sets the childrenKey.
- DotMenu::setIdKey &ndash; Sets the idKey.
- DotMenu::setStrictMode &ndash; Sets the strictMode.





Location
=============
Ling\Light_BMenu\Menu\LightBMenu<br>
See the source code of [Ling\Light_BMenu\Menu\LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/Menu/LightBMenu.php)



SeeAlso
==============
Previous class: [LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md)<br>Next class: [LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService.md)<br>
