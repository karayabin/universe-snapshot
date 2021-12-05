[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserPurchasesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md)


UserPurchasesItemApi::getUserPurchasesItemById
================



UserPurchasesItemApi::getUserPurchasesItemById — Returns the user purchases item row identified by the given id.




Description
================


public [UserPurchasesItemApi::getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user purchases item row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [UserPurchasesItemApi::getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserPurchasesItemApi.php#L149-L163)


See Also
================

The [UserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetch.md)<br>Next method: [getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItem.md)<br>

