[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserHasItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface.md)


UserHasItemApiInterface::getUserHasItemByUserIdAndItemId
================



UserHasItemApiInterface::getUserHasItemByUserIdAndItemId — Returns the user has item row identified by the given user_id and item_id.




Description
================


abstract public [UserHasItemApiInterface::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [UserHasItemApiInterface::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserHasItemApiInterface.php#L96-L96)


See Also
================

The [UserHasItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/fetch.md)<br>Next method: [getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItem.md)<br>

