[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserHasItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi.md)


UserHasItemApi::getUserHasItemByUserIdAndItemId
================



UserHasItemApi::getUserHasItemByUserIdAndItemId — Returns the user has item row identified by the given user_id and item_id.




Description
================


public [UserHasItemApi::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user has item row identified by the given user_id and item_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- user_id

    

- item_id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserHasItemApi::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserHasItemApi.php#L146-L161)


See Also
================

The [UserHasItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetch.md)<br>Next method: [getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItem.md)<br>

