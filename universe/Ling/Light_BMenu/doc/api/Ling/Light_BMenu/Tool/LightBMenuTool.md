[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuTool class
================
2019-08-08 --> 2021-03-18






Introduction
============

The LightBMenuTool class.



Class synopsis
==============


class <span class="pl-k">LightBMenuTool</span>  {

- Methods
    - public static [toAssociative](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/toAssociative.md)(array &$items) : void
    - public static [getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/getActiveOpenInfo.md)(array $item, string $currentUri) : array
    - private static [menuItemIsActive](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/menuItemIsActive.md)(string $url, $currentUri) : bool

}






Methods
==============

- [LightBMenuTool::toAssociative](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/toAssociative.md) &ndash; Takes an array of menu items, and converts it to an array of menu id => menu items.
- [LightBMenuTool::getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/getActiveOpenInfo.md) &ndash; - 0: bool, isActive.
- [LightBMenuTool::menuItemIsActive](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/menuItemIsActive.md) &ndash; Returns whether the menu item (which url is given) matches the given currentUri.





Location
=============
Ling\Light_BMenu\Tool\LightBMenuTool<br>
See the source code of [Ling\Light_BMenu\Tool\LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/Tool/LightBMenuTool.php)



SeeAlso
==============
Previous class: [LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService.md)<br>
