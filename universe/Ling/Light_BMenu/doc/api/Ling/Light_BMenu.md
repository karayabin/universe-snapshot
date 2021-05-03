Ling/Light_BMenu
================
2019-08-08 --> 2021-03-18




Table of contents
===========

- [LightBMenuException](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Exception/LightBMenuException.md) &ndash; The LightBMenuException class.
- [LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md) &ndash; The LightBMenu class.
    - [LightBMenu::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu/__construct.md) &ndash; Builds the DotMenu instance.
    - DotMenu::appendItem &ndash; by the given $parentPath, which is a bdot path.
    - DotMenu::getItems &ndash; Return the items.
    - DotMenu::setItems &ndash; Sets the items.
    - DotMenu::setChildrenKey &ndash; Sets the childrenKey.
    - DotMenu::setIdKey &ndash; Sets the idKey.
    - DotMenu::setStrictMode &ndash; Sets the strictMode.
- [MenuModifierInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface.md) &ndash; The MenuModifierInterface interface.
    - [MenuModifierInterface::updateItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/MenuModifier/MenuModifierInterface/updateItems.md) &ndash; Update the items of the menu.
- [LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService.md) &ndash; The LightBMenuService class.
    - [LightBMenuService::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md) &ndash; Builds the LightBMenuService instance.
    - [LightBMenuService::setContainer](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/setContainer.md) &ndash; Sets the container.
    - [LightBMenuService::addMenuModifier](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addMenuModifier.md) &ndash; Adds a menu modifier to the service instance.
    - [LightBMenuService::getMenusBaseDir](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getMenusBaseDir.md) &ndash; Returns the path to the directory containing all the menus.
    - [LightBMenuService::getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md) &ndash; Returns the computed menu items for the given menu name.
- [LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md) &ndash; The LightBMenuTool class.
    - [LightBMenuTool::toAssociative](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/toAssociative.md) &ndash; Takes an array of menu items, and converts it to an array of menu id => menu items.
    - [LightBMenuTool::getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/getActiveOpenInfo.md) &ndash; - 0: bool, isActive.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DotMenu](https://github.com/lingtalfi/DotMenu)
- [Light](https://github.com/lingtalfi/Light)


