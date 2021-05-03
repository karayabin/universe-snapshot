[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)<br>
[Back to the Ling\Light_BMenu\Tool\LightBMenuTool class](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md)


LightBMenuTool::getActiveOpenInfo
================



LightBMenuTool::getActiveOpenInfo — - 0: bool, isActive.




Description
================


public static [LightBMenuTool::getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/getActiveOpenInfo.md)(array $item, string $currentUri) : array




Parses the given menu item, and returns an array with the following structure:

- 0: bool, isActive. Whether the menu item is active (true only if it's a leaf and the url of the
     item matches the given currentUri)
- 1: bool, isOpened. True only if the item is a parent which contains an active menu item.




Parameters
================


- item

    

- currentUri

    The current uri, as returned by the [HttpRequest->getUri method](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUri.md).


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightBMenuTool::getActiveOpenInfo](https://github.com/lingtalfi/Light_BMenu/blob/master/Tool/LightBMenuTool.php#L49-L69)


See Also
================

The [LightBMenuTool](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool.md) class.

Previous method: [toAssociative](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/toAssociative.md)<br>Next method: [menuItemIsActive](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Tool/LightBMenuTool/menuItemIsActive.md)<br>

