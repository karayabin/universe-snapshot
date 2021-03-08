Ling/Light_BMenu
================
2019-08-08 --> 2021-03-05




Table of contents
===========

- [BMenuDirectInjectorInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md) &ndash; The BMenuDirectInjectorInterface interface.
    - [BMenuDirectInjectorInterface::inject](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface/inject.md) &ndash; Injects menu fragments in the given menu, knowing the "menuStructureId" context.
- [LightBMenuException](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Exception/LightBMenuException.md) &ndash; The LightBMenuException class.
- [LightBMenuAbstractHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost.md) &ndash; The LightBMenuAbstractHost class.
    - [LightBMenuAbstractHost::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/__construct.md) &ndash; Builds the LightBMenuAbstractHost instance.
    - [LightBMenuAbstractHost::getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/getMenuStructureId.md) &ndash; Returns the menu structure id for this host.
    - [LightBMenuAbstractHost::injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/injectDefaultItems.md) &ndash; Inject menu items in the given menu structure.
    - [LightBMenuAbstractHost::onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/onMenuCompiled.md) &ndash; This method is called after the menu has been compiled.
    - [LightBMenuAbstractHost::setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuType.md) &ndash; Sets the menu type.
    - [LightBMenuAbstractHost::setMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setMenuStructureId.md) &ndash; Sets the menuStructureId.
    - [LightBMenuAbstractHost::setDefaultItemsParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuAbstractHost/setDefaultItemsParentPath.md) &ndash; Sets the defaultItemsParentPath.
    - [LightBMenuHostInterface::prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md) &ndash; Injects the base menu structure in the given menu.
- [LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) &ndash; The LightBMenuHostInterface interface.
    - [LightBMenuHostInterface::getMenuStructureId](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/getMenuStructureId.md) &ndash; Returns the menu structure id for this host.
    - [LightBMenuHostInterface::prepareBaseMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/prepareBaseMenu.md) &ndash; Injects the base menu structure in the given menu.
    - [LightBMenuHostInterface::injectDefaultItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/injectDefaultItems.md) &ndash; Inject menu items in the given menu structure.
    - [LightBMenuHostInterface::onMenuCompiled](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/onMenuCompiled.md) &ndash; This method is called after the menu has been compiled.
    - [LightBMenuHostInterface::setMenuType](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface/setMenuType.md) &ndash; Sets the menu type.
- [LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) &ndash; The LightBMenu class.
    - [LightBMenu::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu/__construct.md) &ndash; Builds the DotMenu instance.
    - DotMenu::appendItem &ndash; by the given $parentPath, which is a bdot path.
    - DotMenu::getItems &ndash; Return the items.
    - DotMenu::setItems &ndash; Sets the items.
    - DotMenu::setChildrenKey &ndash; Sets the childrenKey.
    - DotMenu::setIdKey &ndash; Sets the idKey.
    - DotMenu::setStrictMode &ndash; Sets the strictMode.
- [LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService.md) &ndash; The LightBMenuService class.
    - [LightBMenuService::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md) &ndash; Builds the LightBMenuService instance.
    - [LightBMenuService::getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md) &ndash; Returns the computed menu items identified by the given $menuType.
    - [LightBMenuService::registerHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/registerHost.md) &ndash; Registers a host.
    - [LightBMenuService::addDirectInjector](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectInjector.md) &ndash; Adds a direct injector to menu identified by $menuType.
    - [LightBMenuService::addDirectItemsByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFile.md) &ndash; Add direct items to this instance.
    - [LightBMenuService::addDirectItemsByFileAndParentPath](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectItemsByFileAndParentPath.md) &ndash; Add direct items to this instance.
    - [LightBMenuService::addDefaultItem](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItem.md) &ndash; Adds a default item to the menu identified by $menuType.
    - [LightBMenuService::addDefaultItemByFile](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItemByFile.md) &ndash; Adds a default item stored in $path, to the menu identified by $menuType.
- [LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md) &ndash; The LightBMenuTool class.
    - [LightBMenuTool::getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/getActiveOpenInfo.md) &ndash; - 0: bool, isActive.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CheapLogger](https://github.com/lingtalfi/CheapLogger)
- [DotMenu](https://github.com/lingtalfi/DotMenu)


