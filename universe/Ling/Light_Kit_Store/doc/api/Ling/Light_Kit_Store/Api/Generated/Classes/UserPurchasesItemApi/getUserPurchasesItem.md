[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserPurchasesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md)


UserPurchasesItemApi::getUserPurchasesItem
================



UserPurchasesItemApi::getUserPurchasesItem — Returns the userPurchasesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserPurchasesItemApi::getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userPurchasesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [UserPurchasesItemApi::getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserPurchasesItemApi.php#L172-L191)


See Also
================

The [UserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md) class.

Previous method: [getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemById.md)<br>Next method: [getUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItems.md)<br>

