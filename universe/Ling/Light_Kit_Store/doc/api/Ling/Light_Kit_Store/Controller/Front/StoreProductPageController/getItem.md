[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\Front\StoreProductPageController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController.md)


StoreProductPageController::getItem
================



StoreProductPageController::getItem — Returns an array of information about the item which id is given, or null if no item was found.




Description
================


protected [StoreProductPageController::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController/getItem.md)(int $itemId, ?array $options = []) : array | null




Returns an array of information about the item which id is given, or null if no item was found.

See the source code for more info.

Available options are:
- useReviews: bool = true. Whether to return the 8 first reviews in the array.




Parameters
================


- itemId

    

- options

    


Return values
================

Returns array | null.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [StoreProductPageController::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/Front/StoreProductPageController.php#L68-L94)


See Also
================

The [StoreProductPageController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController.md) class.

Previous method: [render](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController/render.md)<br>

