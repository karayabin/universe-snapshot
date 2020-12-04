[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminBMenuHost class
================
2019-05-17 --> 2020-12-01






Introduction
============

The LightKitAdminBMenuHost class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminBMenuHost</span> extends [LightBMenuAbstractHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost.md) implements [LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) {

- Properties
    - protected string [$baseDir](#property-baseDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [LightBMenuAbstractHost::$menuStructureId](#property-menuStructureId) ;
    - protected string [LightBMenuAbstractHost::$menuType](#property-menuType) ;
    - protected string|null [LightBMenuAbstractHost::$defaultItemsParentPath](#property-defaultItemsParentPath) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/__construct.md)() : void
    - public [prepareBaseMenu](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/prepareBaseMenu.md)(Ling\Light_BMenu\Menu\LightBMenu $menu) : mixed
    - public [onMenuCompiled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/onMenuCompiled.md)(array &$menu) : void
    - public [setBaseDir](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/setBaseDir.md)(string $baseDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - public LightBMenuAbstractHost::getMenuStructureId() : string
    - public LightBMenuAbstractHost::injectDefaultItems(array $items, Ling\Light_BMenu\Menu\LightBMenu $menu) : mixed
    - public LightBMenuAbstractHost::setMenuType(string $menuType) : void
    - public LightBMenuAbstractHost::setMenuStructureId(string $menuStructureId) : void
    - public LightBMenuAbstractHost::setDefaultItemsParentPath(string $defaultItemsParentPath) : void

}




Properties
=============

- <span id="property-baseDir"><b>baseDir</b></span>

    This property holds the base directory for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

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

- [LightKitAdminBMenuHost::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/__construct.md) &ndash; Builds the LightKitAdminBMenuHost instance.
- [LightKitAdminBMenuHost::prepareBaseMenu](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/prepareBaseMenu.md) &ndash; Injects the base menu structure in the given menu.
- [LightKitAdminBMenuHost::onMenuCompiled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/onMenuCompiled.md) &ndash; This method is called after the menu has been compiled.
- [LightKitAdminBMenuHost::setBaseDir](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/setBaseDir.md) &ndash; Sets the baseDir.
- [LightKitAdminBMenuHost::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost/setContainer.md) &ndash; Sets the container.
- LightBMenuAbstractHost::getMenuStructureId &ndash; Returns the menu structure id for this host.
- LightBMenuAbstractHost::injectDefaultItems &ndash; Inject menu items in the given menu structure.
- LightBMenuAbstractHost::setMenuType &ndash; Sets the menu type.
- LightBMenuAbstractHost::setMenuStructureId &ndash; Sets the menuStructureId.
- LightBMenuAbstractHost::setDefaultItemsParentPath &ndash; Sets the defaultItemsParentPath.





Location
=============
Ling\Light_Kit_Admin\BMenu\LightKitAdminBMenuHost<br>
See the source code of [Ling\Light_Kit_Admin\BMenu\LightKitAdminBMenuHost](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/BMenu/LightKitAdminBMenuHost.php)



SeeAlso
==============
Previous class: [LightKitAdminAjaxHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler.md)<br>Next class: [LightKitAdminGeneralBullsheeter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter.md)<br>
