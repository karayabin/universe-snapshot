[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserPurchasesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface.md)


UserPurchasesItemApiInterface::delete
================



UserPurchasesItemApiInterface::delete — Deletes the userPurchasesItem rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserPurchasesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userPurchasesItem rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [UserPurchasesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserPurchasesItemApiInterface.php#L256-L256)


See Also
================

The [UserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface.md) class.

Previous method: [updateUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/updateUserPurchasesItem.md)<br>Next method: [deleteUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemById.md)<br>

