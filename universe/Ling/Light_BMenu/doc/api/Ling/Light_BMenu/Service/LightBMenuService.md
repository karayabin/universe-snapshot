[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuService class
================
2019-08-08 --> 2020-08-10






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
    - protected [Ling\Light_BMenu\Host\LightBMenuHostInterface[]](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) [$hosts](#property-hosts) ;
    - protected array [$directInjectors](#property-directInjectors) ;
    - protected array [$directItems](#property-directItems) ;
    - protected array [$defaultItems](#property-defaultItems) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md)() : void
    - public [getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md)(string $menuType) : array
    - public [registerHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/registerHost.md)(string $menuType, [Ling\Light_BMenu\Host\LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) $host) : void
    - public [addDirectInjector](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectInjector.md)(string $menuType, $injector) : void
    - public [addDirectItemsByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFile.md)(string $menuType, string $file) : void
    - public [addDirectItemsByFileAndParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFileAndParentPath.md)(string $menuType, string $file, string $parentPath) : void
    - public [addDefaultItem](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItem.md)(string $menuType, array $item) : void
    - public [addDefaultItemByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItemByFile.md)(string $menuType, string $path) : void

}




Properties
=============

- <span id="property-hosts"><b>hosts</b></span>

    This property holds the host for this instance.
    
    Array of menuType => LightBMenuHostInterface instance
    
    

- <span id="property-directInjectors"><b>directInjectors</b></span>

    This property holds the directInjectors for this instance.
    
    It's an array of menuType => directInjectors.
    
    With:
    - menuType: string, the menu type (see [bmenu conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md) for more details)
    - directInjectors: BMenuDirectInjectorInterface[]|callable[], an array of direct injectors,
             each of which being either a BMenuDirectInjectorInterface instance, or a
             php callable which take two arguments: the menuStructureId and the LightBMenu instance.
    
    

- <span id="property-directItems"><b>directItems</b></span>

    This property holds the directItems for this instance.
    
    It's an array of menuType => menuPath2Items,
    
    with menuPath2Items: array of [bdot](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md) menuPath to menu items
    
    

- <span id="property-defaultItems"><b>defaultItems</b></span>

    This property holds the defaultItems for this instance.
    
    An array of menuType => defaultItems.
    
    With:
    - menuType: string, the menu type (see [bmenu conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md) for more details)
    - defaultItems: an array of menu items
    
    
    See the [bmenu conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightBMenuService::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md) &ndash; Builds the LightBMenuService instance.
- [LightBMenuService::getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md) &ndash; Returns the computed menu items identified by the given $menuType.
- [LightBMenuService::registerHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/registerHost.md) &ndash; Registers a host.
- [LightBMenuService::addDirectInjector](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectInjector.md) &ndash; Adds a direct injector to menu identified by $menuType.
- [LightBMenuService::addDirectItemsByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFile.md) &ndash; Add direct items to this instance.
- [LightBMenuService::addDirectItemsByFileAndParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFileAndParentPath.md) &ndash; Add direct items to this instance.
- [LightBMenuService::addDefaultItem](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItem.md) &ndash; Adds a default item to the menu identified by $menuType.
- [LightBMenuService::addDefaultItemByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItemByFile.md) &ndash; Adds a default item stored in $path, to the menu identified by $menuType.





Location
=============
Ling\Light_BMenu\Service\LightBMenuService<br>
See the source code of [Ling\Light_BMenu\Service\LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/Service/LightBMenuService.php)



SeeAlso
==============
Previous class: [LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md)<br>Next class: [LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md)<br>
