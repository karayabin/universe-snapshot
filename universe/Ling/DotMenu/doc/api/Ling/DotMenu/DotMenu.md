[Back to the Ling/DotMenu api](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu.md)



The DotMenu class
================
2019-08-08 --> 2019-08-08






Introduction
============

The DotMenu class.

This class let you create a menu using [bdot notation](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md).

An item is an array which must contain at least the following keys:

- children: an array of items (to allow nesting recursively)
- id: the identifier of the item (to allow targeting with bdot notation)

Note: the "children" and "id" names can be changed with the configuration.

Also, sibling items should not have the same identifier (otherwise results will be unpredictable).



Class synopsis
==============


class <span class="pl-k">DotMenu</span>  {

- Properties
    - protected string [$childrenKey](#property-childrenKey) ;
    - protected string [$idKey](#property-idKey) ;
    - protected array [$items](#property-items) ;
    - protected bool [$strictMode](#property-strictMode) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/__construct.md)() : void
    - public [appendItem](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/appendItem.md)(array $item, string $parentPath = null) : void
    - public [getItems](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/getItems.md)() : array
    - public [setItems](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setItems.md)(array $items) : void
    - public [setChildrenKey](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setChildrenKey.md)(string $childrenKey) : void
    - public [setIdKey](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setIdKey.md)(string $idKey) : void
    - public [setStrictMode](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setStrictMode.md)(bool $strictMode) : void

}




Properties
=============

- <span id="property-childrenKey"><b>childrenKey</b></span>

    This property holds the childrenKey for this instance.
    
    

- <span id="property-idKey"><b>idKey</b></span>

    This property holds the idKey for this instance.
    
    

- <span id="property-items"><b>items</b></span>

    This property holds the items for this instance.
    
    

- <span id="property-strictMode"><b>strictMode</b></span>

    This property holds the strictMode for this instance.
    When the strict mode is activated, an exception is thrown whenever the addItem is called
    but the parentPath couldn't be found.
    By default, the strict mode is not enabled, and so we just ignore such calls.
    
    



Methods
==============

- [DotMenu::__construct](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/__construct.md) &ndash; Builds the DotMenu instance.
- [DotMenu::appendItem](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/appendItem.md) &ndash; by the given $parentPath, which is a bdot path.
- [DotMenu::getItems](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/getItems.md) &ndash; Return the items.
- [DotMenu::setItems](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setItems.md) &ndash; Sets the items.
- [DotMenu::setChildrenKey](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setChildrenKey.md) &ndash; Sets the childrenKey.
- [DotMenu::setIdKey](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setIdKey.md) &ndash; Sets the idKey.
- [DotMenu::setStrictMode](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/setStrictMode.md) &ndash; Sets the strictMode.





Location
=============
Ling\DotMenu\DotMenu<br>
See the source code of [Ling\DotMenu\DotMenu](https://github.com/lingtalfi/DotMenu/blob/master/DotMenu.php)



SeeAlso
==============
Next class: [DotMenuException](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/Exception/DotMenuException.md)<br>
