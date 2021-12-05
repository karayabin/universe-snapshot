[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserPurchasesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md)


UserPurchasesItemApi::insertUserPurchasesItem
================



UserPurchasesItemApi::insertUserPurchasesItem — Inserts the given user purchases item in the database.




Description
================


public [UserPurchasesItemApi::insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItem.md)(array $userPurchasesItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user purchases item in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userPurchasesItem

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserPurchasesItemApi::insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserPurchasesItemApi.php#L43-L94)


See Also
================

The [UserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/__construct.md)<br>Next method: [insertUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItems.md)<br>

