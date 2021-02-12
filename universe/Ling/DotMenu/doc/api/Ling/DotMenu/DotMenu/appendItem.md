[Back to the Ling/DotMenu api](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu.md)<br>
[Back to the Ling\DotMenu\DotMenu class](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu.md)


DotMenu::appendItem
================



DotMenu::appendItem — by the given $parentPath, which is a bdot path.




Description
================


public [DotMenu::appendItem](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/appendItem.md)(array $item, ?string $parentPath = null) : void




Appends an item to the menu, the parent of this item being the parent identified
by the given $parentPath, which is a bdot path.

If the parent path is null, the item is appended to the root.




Parameters
================


- item

    

- parentPath

    


Return values
================

Returns void.


Exceptions thrown
================

- [DotMenuException](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/Exception/DotMenuException.md).&nbsp;







Source Code
===========
See the source code for method [DotMenu::appendItem](https://github.com/lingtalfi/DotMenu/blob/master/DotMenu.php#L88-L118)


See Also
================

The [DotMenu](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu.md) class.

Previous method: [__construct](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/__construct.md)<br>Next method: [getItems](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu/DotMenu/getItems.md)<br>

